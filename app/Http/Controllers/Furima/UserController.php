<?php

namespace App\Http\Controllers\Furima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class UserController extends Controller
{
    public function showUsers()
    {
        // $furima_users = DB::connection('mysql_A')->select('select * from users');
        $furima_users = DB::connection('mysql_A')
            ->table('users')
            ->leftJoin('items', 'users.id', '=', 'items.seller_id')
            ->orderBy('items.created_at', 'DESC')
            ->get();
        return view('furima.users')
            ->with('furima_users', $furima_users);
    }

    public function exportUsersCsv(Request $request)
    {
        $post = $request->all();
        $response = new StreamedResponse(function () use ($request, $post) {
            $stream =fopen('php://output', 'W');

            // 文字化け回避
            stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');

            // ヘッダーを追加
            fputcsv($stream, $this->getHeader());

            $resuluts = $this->getCsvData($post['start_date'], $post['end_date']);

            if (empty($resuluts[0])){
                fputcsv($stream, ['データが存在しません']);
            } else {
                foreach ($resuluts as $row) {
                    fputcsv($stream, $this->csvRow($row));
                }
            };

            //ファイルを閉じる
            fclose($stream);
        });
        // 汎用的なバイナリデータ (または本当のタイプが不明なバイナリデータ)で指定
        $response->headers->set('Content-Type', 'application/octet-stream');
        // 保存させるファイル名を指定
        $response->headers->set('Content-Disposition', 'attachment; filename'. $post['start_date']. '〜'. $post['end_date']. 'furimaユーザー情報一覧.csv');

        return $response;
    }

}
