<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filter Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-12">
            <h3>ข้อมูล Product</h3>
        </div>
    </div>
    <div class="row">
        {{-- {{ dd($paginator) }} --}}
        @if ($paginator)
            <!-- แสดงข้อมูลที่ได้รับ -->
            @foreach ($paginator->items() as $item)
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $item['img'] }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <h4 class="card-title text-truncate">{{ $item['product'] }}</h4>
                                </div>
                                <div class="col-5">
                                    <span>{{ $item['price'] }}</span>
                                </div>
                                <div class="col-12">
                                    <div class=""
                                        style="min-height: 100px; max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
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

            {{ $paginator->links() }}
        @else
            <!-- ถ้าไม่มีข้อมูล -->
            ไม่มีข้อมูล
        @endif
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
