<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
        body {
            margin: 10px auto;
            width: 570px;
            font: 75%/120% Arial, Helvetica, sans-serif;
        }
        .accordion {
            width: 480px;
            border-bottom: solid 1px #c4c4c4;
        }
        .accordion h3 {
            background: #e9e7e7;
            padding: 7px 15px;
            margin: 0;
            font: bold 120%/100% Arial, Helvetica, sans-serif;
            border: solid 1px #c4c4c4;
            border-bottom: none;
            cursor: pointer;
        }
        .accordion h3:hover {
            background-color: #e3e2e2;
        }
        .accordion h3.active {
            background-position: right 5px;
        }
        .accordion p {
            background: #f7f7f7;
            margin: 0;
            padding:  10px 15px 20px;
            border-left: solid 1px #c4c4c4;
            border-right: solid 1px #c4c4c4;
        }
        @media screen and (max-width: 480px) {
            body {
                width:100%;
                margin: 0;
                padding:0;
            }
            .accordion {
                width:98%;
                margin:1%;
            }
            .accordion h3 {
                padding: 12px 15px;
            }

        }
    </style>

    <title>Document</title>
</head>
<body>

<div class="accordion">
    <h3>Инфо о товарах(клацать сюда)</h3>
    <table border="1" class="table table-hover">
        <thead id="start">
        <th>prdouct_id</th>
        <th>product_name</th>
        <th>price</th>
        <th>quantity</th>
        <th>description</th>
        <th>category</th>
        </thead>
        <tbody id="table_body">

        </tbody>
    </table>
</div>

<hr>

<h2>Задание№2</h2>
<div>
    <form action="/vk_img" method="post" enctype="multipart/form-data">
        <p><label for="id">id<br/>
                <input type="text" name="user_id"></label></p>
        <p><label for=""><input type="file" name="picture"></label></p>
        <input type="submit">
    </form>
</div>


<script type='text/javascript' src='views/jquery-3.1.0.min.js'></script>
<script type='text/javascript' src='views/main.js'></script>
</body>
</html>