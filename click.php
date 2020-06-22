<!--<html>-->
<!--<head>-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" >-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script>-->
<!--</head>-->
<!--<body>-->
<!---->
<!--<div id='prev' class="col-md-3 py-5">-->
<!--    <button type="button" class="btn bg-light border rounded-circle" id="minus"><i class="fas fa fa-minus" ></i></button>-->
<!--    <input type="text" id="plus_minus_quantity" value="1" class="form-controls w-25 d-inline">-->
<!--    <button type="button" class="btn bg-light border rounded-circle" id="plus"> <i class="fas fa fa-plus" ></i></button>-->
<!---->
<!--</div>-->
<!--<div>-->
<!--    <button type="button" id="save"  value="">SAVE</button>-->
<!--</div>-->
<!--<div id="prev" class="col-md-3 py-5">-->
<!--    <button type="button" class="btn bg-light border rounded-circle" id="minus"><i class="fas fa fa-minus" ></i></button>-->
<!--    <input type="text" id="plus_minus_quantity" value="1" class="form-controls w-25 d-inline">-->
<!--    <button type="button" class="btn bg-light border rounded-circle" id="plus"> <i class="fas fa fa-plus" ></i></button>-->
<!---->
<!--</div>-->
<!--<div>-->
<!--        <ul>ul (grandparent)-->
<!--            <li>li (direct parent)-->
<!--                <span>span</span>-->
<!--            </li>-->
<!--        </ul>-->
<!--    <button type="button" id="save"  value="">SAVE</button>-->
<!---->
<!--</div>-->
<!--</body>-->
<!--<script>-->
<!--    $('div button i.fa-plus').parent().click(function(){-->
<!--        let last_value = $(this).parent().children("input").val();-->
<!--        last_value++;-->
<!--        $(this).parent().children("input").val(last_value);-->
<!--    });-->
<!--    $('div button i.fa-minus').parent().click(function(){-->
<!--        let last_value = $(this).parent().children("input").val();-->
<!--        if(last_value <= 1) return;-->
<!--        last_value--;-->
<!--        $(this).parent().children("input").val(last_value);-->
<!--    });-->
<!---->
<!---->
<!--    $(document).ready(function () {-->
<!--        $(document).on('click','#save',function () {-->
<!--            // Changed this line to reference the sibling of the button that was clicked-->
<!--            let value= $(this).parent().prev('#prev').children('#plus_minus_quantity').val();-->
<!--            // let value= $(this).siblings('#plus_minus_quantity').val();-->
<!--            let id = $(this).attr("value");-->
<!--            // console.log(value);-->
<!--            alert(value);-->
<!---->
<!--        });-->
<!---->
<!--    })-->
<!--</script>-->
<!--</html>-->
