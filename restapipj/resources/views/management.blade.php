<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style>
    table {
      text-align: left;
    }

    th,
    td {
      white-space: nowarap;
    }

    input[type="text"],
    input[type="date"] {
      border: 1px solid #a9a9a9;
      height: 30px;
      border-radius: 5px;
      font-size: 16px;
      width: 220px;
    }

    input[type="radio"] {
      width: 2em;
      height: 2em;
    }

    input[type="radio"]:hover {
      cursor: pointer;
    }

    input[type="button"]:hover {
      cursor: pointer;
    }

    .container {
      position: absolute;
      top: 0px;
      left: 50%;
      transform: translate(-50%, 0%);
      text-align: center;
      width: 90%;
    }

    .management_layout {
      border: 1px solid #000;
      padding: 20px 40px;
    }

    .management_table tr {
      height: 50px;
    }

    .th_item {
      white-space: nowarap;
      width: 140px;
    }

    .td_radio {
      display: flex;
      vertical-align: top;
    }

    .radio_item:nth-child(1) {
      padding-left: 30px;
      font-weight: bold;
    }

    .radio_item {
      width: 60px;
      padding: 4px 0 0 2px;
    }

    .div_send {
      padding-top: 30px;
    }

    .btn_send {
      background: #000;
      color: #fff;
      width: 120px;
      height: 35px;
      border-radius: 4px;
    }

    .pagination_layout {
      width: 100%;
      display: flex;
      justify-content: space-between;
    }

    svg.w-5.h-5 {
      width: 24px;
      height: 24px;
      border: 1px solid #000;
    }

    .pagination {
      padding-top: 14px;
    }

    .pagination a {
      text-decoration: none;
    }

    .page {
      display: inline-block;
      width: 24px;
      height: 24px;
      border: 1px solid #000;
    }

    .page_select {
      display: inline-block;
      width: 24px;
      height: 24px;
      border: 1px solid #000;
      background-color: #000;
      color: #fff;
    }

    .list_table {
      border-collapse: collapse;
    }

    .list_table th {
      white-space: nowrap;
      border-bottom: 2px solid #000;
    }

    .list_table th:nth-child(1) {
      min-width: 100px;
      text-align: center;
    }

    .list_table td {
      vertical-align: top;
      white-space: nowrap;
      padding: 4px 10px 4px 0;
    }

    .list_table td:nth-child(1) {
      min-width: 100px;
      text-align: center;
    }

    .list_table td:nth-child(2) {
      min-width: 220px;
    }

    .list_table td:nth-child(3) {
      width: 60px;
    }

    .list_table td:nth-child(4) {
      min-width: 280px;
    }

    .list_table td:nth-child(5) {
      min-width: 250px;
    }


    .list_table td:nth-child(6) {
      min-width: 100px;
    }

    .btn_del {
      background: #000;
      color: #fff;
      width: 60px;
      border-radius: 4px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>管理システム</h2>
    <div class="management_layout">
      <form method="get" action="/management">
        @csrf
        <table class="management_table">
          <tr>
            <th class="th_item">お名前</th>
            <td>
              <input type="text" name="name" value="{{ session('name') }}">
            </td>
            <td>
              <div class="td_radio">
                <span class="radio_item">性別</span>
                <input type="radio" value="" name="gender" {{ session("gender") == "" ? "checked" : "" }}>
                <span class="radio_item">全て</span>
                <input type="radio" value="1" name="gender" {{ session("gender") == "1" ? "checked" : "" }}>
                <span class="radio_item">男性</span>
                <input type="radio" value="2" name="gender" {{ session("gender") == "2" ? "checked" : "" }}>
                <span class="radio_item">女性</span>
              </div>
            </td>
          </tr>
          <tr>
            <th class="th_item">登録日</th>
            <td colspan="2">
              <input type="date" name="date1" value="{{ session('date1') }}">
              <span>　～　</span>
              <input type="date" name="date2" value="{{ session('date2') }}">
            </td>
          </tr>
          <tr>
            <th class="th_item">メールアドレス</th>
            <td colspan="2">
              <input type="text" name="email" value="{{ session('email') }}">
            </td>
          </tr>
        </table>
        <div class="div_send">
          <input type="submit" value="検索" class="btn_send">
      </form>
      <p>
        <a href="/management">リセット</a>
      </p>

    </div>
  </div>

  <div>
    <div>
      {{$items->appends(request()->query())->links()}}
    </div>
    <table class=" list_table">
      <tr>
        <th>ID</th>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>ご意見</th>
        <th></th>
      </tr>
      @foreach ($items as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->fullname}}</td>
        <td>
          @if($item->gender===1)
          男性
          @else
          女性
          @endif
        </td>
        <td>{{$item->email}}</td>
        <td>
          @if(mb_strlen($item->opinion)>25)
          {{ substr($item->opinion,1,25) }}...
          @else
          {{$item->opinion}}
          @endif
        </td>
        <td>
          <input type="button" value="削除" onclick="del({{ $item->id }});" class="btn_del">
        </td>
      </tr>
      @endforeach
    </table>
  </div>

  </div>
</body>
<script>
  function del(val) {
    let flg = window.confirm("削除します");
    if (flg) {
      $.ajax({
        url: '/del',
        method: 'get',
        data: {
          'id': val
        },
      }).then(function(response) {
        location.reload();
      });
    }
  }
</script>

</html>