<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filter Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 text-center">
                <h4>รายการสินค้า</h4>
            </div>
            <div class="col-4 ">
                <form action="{{ route('index') }}" method="GET">
                    <div class="accordion accordion-flush border border-1 mt-1" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    ค้นหารายการสินค้า
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <input type="text" class="form-control" placeholder="ค้นหาสินค้า" name="search"
                                        value="{{ $searchname }}">
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    เรียงข้อมูลตามราคา
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body text-center">
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="radio" class="btn-check" name="sortprice" id="option0"
                                                autocomplete="off" value=""
                                                {{ $sortprice == '' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-primary" for="option0">ค่าเริ่มต้น</label>
                                        </div>
                                        <div class="col-4">
                                            <input type="radio" class="btn-check" name="sortprice" id="option1"
                                                autocomplete="off" value="asc"
                                                {{ $sortprice == 'asc' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-primary"
                                                for="option1">เรียงจากน้อยไปมาก</label>
                                        </div>
                                        <div class="col-4">
                                            <input type="radio" class="btn-check" name="sortprice" id="option2"
                                                autocomplete="off" value="desc"
                                                {{ $sortprice == 'desc' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-primary"
                                                for="option2">เรียงจากมากไปน้อย</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="form-control mt-2 btn btn-primary " type="submit">แสดงผลลัพธ์</button>
                </form>
            </div>
            <div class="col-8 ">
                <div class="row">
                    {{-- {{ dd($paginator) }} --}}
                    @if ($paginator)
                        <!-- แสดงข้อมูลที่ได้รับ -->
                        @foreach ($paginator->items() as $item)
                            <div class="col-4 my-1">
                                <div class="card">
                                    <img src="{{ $item['img'] }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-7">
                                                <h5 class="card-title text-truncate">{{ $item['product'] }}</h5>
                                            </div>
                                            <div class="col-5">
                                                <span>{{ $item['price'] }}</span>
                                            </div>
                                            <div class="col-12">
                                                <div class=""
                                                    style="min-height: 75px; max-height: 75px; overflow: hidden; text-overflow: ellipsis;">
                                                    <span class="">{{ $item['text'] }}</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <a href="#" class="btn btn-primary form-control">ดูรายละเอียด</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div>
                            <div class="row d-flex align-items-center">
                                <div class="col-9">
                                    {{ $paginator->links() }}
                                </div>
                                <div class="col-3">
                                    <h5>
                                        {{ $paginator->count() }} จากทั้งหมด {{ $paginator->total() }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- ถ้าไม่มีข้อมูล -->
                        ไม่มีข้อมูล
                    @endif
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
