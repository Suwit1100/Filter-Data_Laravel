<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\Http;

class FilterDataController extends Controller
{
    public function index()
    {
        PaginationPaginator::useBootstrap();
        $testid = "";
        $response = Http::get('https://6624b23204457d4aaf9cc0f6.mockapi.io/api/ApiMockFSW/ProductMock');
        $product = collect($response->json());

        $filteredProduct = $product->when($testid, function ($query, $testid) {
            return $query->where('id', "$testid");
        });

        // จำนวนรายการที่ต้องการแสดงต่อหน้า
        $perPage = 8;

        if ($filteredProduct->count() > 0) {
            // หาหน้าปัจจุบัน
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            // คำนวณ offset สำหรับข้อมูลที่จะแสดงในหน้าปัจจุบัน
            $currentPageItems = $filteredProduct->slice(($currentPage - 1) * $perPage, $perPage)->all();

            // สร้าง paginator instance โดยใช้ LengthAwarePaginator
            $paginator = new LengthAwarePaginator($currentPageItems, $filteredProduct->count(), $perPage);

            // กำหนด URL ของหน้าต่อไปและหน้าก่อนหน้า
            $paginator->setPath(url()->current());

            // dd($paginator);

            // ส่ง paginator instance ไปใช้งานใน view
            return view('index', ['paginator' => $paginator]);
        } else {
            // ถ้าไม่มีข้อมูลให้ส่งข้อมูลว่างๆ ไปยัง view
            return view('index', ['paginator' => null]);
        }
    }
}
