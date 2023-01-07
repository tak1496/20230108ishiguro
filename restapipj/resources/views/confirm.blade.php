<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    tr {
      height: 100px;
    }

    th {
      width: 150px;
      text-align: left;
      white-space: nowrap;
    }

    td {
      width: 370px;
      text-align: left;
      white-space: nowrap;
    }

    .container {
      position: absolute;
      top: 0px;
      left: 50%;
      transform: translate(-50%, 0%);
      text-align: center;
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

    .btn_send:hover {
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>内容確認</h2>
    <table>
      <tr>
        <th>お名前</th>
        <td>
          {{ $name1 }} {{ $name2 }}
        </td>
      </tr>
      <tr>
        <th>性別</th>
        <td>
          @if($gender==='1')
          男性
          @else
          女性
          @endif
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{ $email }}</td>
      </tr>
      <tr>
        <th>郵便番号</th>
        <td>{{ $post }}</td>
      </tr>
      <tr>
        <th>住所</th>
        <td>{{ $address }}</td>
      </tr>
      <tr>
        <th>建物名</th>
        <td>{{ $building }}</td>
      </tr>
      <tr>
        <th>ご意見</th>
        <td>{{ $opinion }}</td>
      </tr>
    </table>

    <div class="div_send">
      <form method="post" action="/add">
        @csrf
        <input type="hidden" name="fullname" value="{{ $name1 }} {{ $name2 }}">
        <input type="hidden" name="gender" value="{{ $gender }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="postcode" value="{{ $post }}">
        <input type="hidden" name="address" value="{{ $address }}">
        <input type="hidden" name="building_name" value="{{ $building }}">
        <input type="hidden" name="opinion" value="{{ $opinion }}">
        <input type="submit" value="送信" class="btn_send">
        <p>
          <a href="#" onclick="history.back(-1);return false;">修正する</a>
        </p>
      </form>
    </div>

  </div>
</body>

</html>