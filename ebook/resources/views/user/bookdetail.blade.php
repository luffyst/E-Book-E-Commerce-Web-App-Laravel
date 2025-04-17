<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!------ Include the above in your HEAD tag ---------->
    <style>
       

        .item-photo {
            display: flex;
            justify-content: center;
            align-items: center;
            border-right: 1px solid #f6f6f6;
            width: 550px;
            height: 400px;
        }

        .menu-items {
            list-style-type: none;
            font-size: 11px;
            display: inline-flex;
            margin-bottom: 0;
            margin-top: 20px
        }

        .btn-success {
            width: 100%;
            border-radius: 0;
        }

        .section {
            width: 100%;
            margin-left: -15px;
            padding: 2px;
            padding-left: 15px;
            padding-right: 15px;
            background: #f8f9f9
        }

        .title-price {
            margin-top: 30px;
            margin-bottom: 0;
            color: black
        }

        .title-attr {
            margin-top: 0;
            margin-bottom: 0;
            color: black;
        }

        .btn-minus {
            cursor: pointer;
            font-size: 7px;
            display: flex;
            align-items: center;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid gray;
            border-radius: 2px;
            border-right: 0;
        }

        .btn-plus {
            cursor: pointer;
            font-size: 7px;
            display: flex;
            align-items: center;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid gray;
            border-radius: 2px;
            border-left: 0;
        }

        div.section>div {
            width: 100%;
            display: inline-flex;
        }

        div.section>div>input {
            margin: 0;
            padding-left: 5px;
            font-size: 10px;
            padding-right: 5px;
            max-width: 18%;
            text-align: center;
        }

        .attr,
        .attr2 {
            cursor: pointer;
            margin-right: 5px;
            height: 20px;
            font-size: 10px;
            padding: 2px;
            border: 1px solid gray;
            border-radius: 2px;
        }

        .attr.active,
        .attr2.active {
            border: 1px solid orange;
        }

        @media (max-width: 426px) {
            .container {
                margin-top: 100px !important;
            }

            .container>.row {
                padding: 0 !important;
            }

            .container>.row>.col-xs-12.col-sm-5 {
                padding-right: 0;
            }

            .container>.row>.col-xs-12.col-sm-9>div>p {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .container>.row>.col-xs-12.col-sm-9>div>ul {
                padding-left: 0 !important;

            }

            .section {
                width: 104%;
            }

            .menu-items {
                padding-left: 0;
            }
        }

        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: 50px;
        }
    </style>
</head>


<body>
    @include('user.nav')
                     @if(Session::has('msg'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('msg')}}
                            </div>
                    @endif
    <div class="center-content">
        <div class="row">
      
            <div class="container">
                <div class="row">
                  
                    <div class="col-xs-4 item-photo">
                        <img style="width:100%; height:400px;" src="{{asset($books->img)}}" />
                    </div>

                    <div class="col-xs-5" style="border:0px solid gray">
                        <!-- Datos del vendedor y titulo del producto -->
                        <h3>{{$books->name}}</h3>


                        <!-- Precios -->
                        <h6 class="title-price"><small>Price</small></h6>
                        <h3 style="margin-top:0px;">{{$books->price}}Rs</h3>
                        
                        
                        <div class="section" style="padding-bottom:5px;">
                            <h6 class="title-attr"><small>Description</small></h6>
                            <div>
                                <p>{{$books->desc}}</p>
                            </div>
                        </div>
                        <form action="{{route('cart',$books->id)}}" method="POST">
                            @csrf
                            <div class="section" style="padding-bottom:20px;">
                                <h6 class="title-attr"><small>Order Quantity</small></h6>
                                <div>
                                    <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                                    <input value="1" name="qty"/>
                                    <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                                </div>
                            </div>
                            <input type="hidden" name="price" value="{{$books->price}}">
                            
                            <!-- Botones de compra -->
                            <div class="section" style="padding-bottom:20px;">
                                <span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><button class="btn btn-success">Add To Cart</button>
                                
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

    @include('user.footer')
    <script>
        $(document).ready(function() {
            //-- Click on detail
            $("ul.menu-items > li").on("click", function() {
                $("ul.menu-items > li").removeClass("active");
                $(this).addClass("active");
            })

            $(".attr,.attr2").on("click", function() {
                var clase = $(this).attr("class");

                $("." + clase).removeClass("active");
                $(this).addClass("active");
            })

            //-- Click on QUANTITY
            $(".btn-minus").on("click", function() {
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)) {
                    if (parseInt(now) - 1 > 0) {
                        now--;
                    }
                    $(".section > div > input").val(now);
                } else {
                    $(".section > div > input").val("1");
                }
            })
            $(".btn-plus").on("click", function() {
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)) {
                    $(".section > div > input").val(parseInt(now) + 1);
                } else {
                    $(".section > div > input").val("1");
                }
            })
        })
    </script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</body>

</html>