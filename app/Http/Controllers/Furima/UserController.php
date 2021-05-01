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

    public function getCsvData($start=null, $end=null)
    {
        $start_date = str_replace('年', '-', $start); // "年"を"-"に置換する
        $start_date = str_replace('月', '-', $start_date); // "月"を"-"に置換する
        $start_date = str_replace('日', '', $start_date);  // "日"を空文字に置換する
        $end_date = str_replace('年', '-', $end); // "年"を"-"に置換する
        $end_date = str_replace('月', '-', $end_date); // "月"を"-"に置換する
        $end_date = str_replace('日', '', $end_date);  // "日"を空文字に置換する

        $data = DB::connection('mysql_A')
        ->table('users')
        ->select('users.*','i.name AS item_name', 'i.created_at AS item_created', 'i.updated_at AS item_updated_at', 'i.description AS item_description', 'i.price AS item_price', 'i.state AS item_state', 'i.bought_at AS item_bought_at')
        ->leftJoin('items AS i', 'users.id', '=', 'i.seller_id')
        ->orderBy('i.created_at', 'ASC')
        ->get();

        // $data = DB::connection('mysql_A')
        // ->table('users')
        // ->leftJoin('items', 'users.id', '=', 'items.seller_id')
        // ->whereBetween('items.created_at', [$start_date. ' 00:00:00', $end_date. ' 23:59:59'])
        // ->orderBy('items.created_at', 'ASC')
        // ->get();

        return $data;
    }

    public function getHeader()
    {
        return [
            'id',
            "name",
            "email",
            "sales",
            "created_at",
            "updated_at",
            "item_name",
            "item_description",
            "item_price",
            "item_state",
            "item_bought_at",
            "item_created",
            "item_updated_at"
        ];
    }

    public function csvRow($row)
    {
        return [
            $row->id,
            $row->name,
            $row->email,
            $row->sales,
            $row->created_at,
            $row->updated_at,
            $row->item_name,
            $row->item_description,
            $row->item_price,
            $row->item_state,
            $row->item_bought_at,
            $row->item_created,
            $row->item_updated_at,
        ];
    }
}


