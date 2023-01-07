<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    input[type="text"],
    input[type="email"] {
      border: 1px solid #a9a9a9;
      height: 25px;
      border-radius: 5px;
      font-size: 16px;
    }

    input[type="radio"] {
      width: 2em;
      height: 2em;
    }

    textarea {
      resize: none;
    }

    .container {
      position: absolute;
      top: 0px;
      left: 50%;
      transform: translate(-50%, 0%);
      text-align: center;
    }

    .caution {
      color: red;
    }

    .th_item {
      width: 150px;
      text-align: left;
      white-space: nowrap;
      vertical-align: top;
    }

    .input_form1 {
      width: 180px;
    }

    .input_form2 {
      width: 370px;
    }

    .input_form3 {
      width: 355px;
    }

    .input_form4 {
      width: 365px;
      height: 100px;
      border: 1px solid #a9a9a9;
      border-radius: 5px;
      font-size: 16px;
      padding: 5px;
    }

    .td_radio {
      display: flex;
      vertical-align: top;
    }

    input[type="radio"]:hover {
      cursor: pointer;
    }

    .radio_item {
      width: 70px;
      padding: 4px 0 0 2px;
      text-align: left;
    }

    .tr_mes {
      height: 40px;
      font-size: 12px;
      color: gray;
      text-align: left;
      vertical-align: top;
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

    .td_error {
      font-size: 12px;
      color: red;
      text-align: left;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>お問い合わせ</h2>
    @if (count($errors) > 0)
    <p>入力に問題があります</p>
    @endif
    <form action="/" method="POST">
      <table>
        @csrf
        <tr>
          <th class=" th_item">
            お名前<span class="caution">※</span>
          </th>
          <td>
            <input type="text" name="name1" class="input_form1">
          </td>
          <td class="td_item1">
            <input type="text" name="name2" class="input_form1">
          </td>
        </tr>
        <tr>
          <td></td>
          <td class="td_error">
            @error('name1')
            {{$message}}
            @enderror
          </td>
          <td class="td_error">
            @error('name2')
            {{$message}}
            @enderror
          </td>
        </tr>
        <tr class="tr_mes">
          <td></td>
          <td>　例）山田</td>
          <td>　例）太郎</td>
        </tr>

        <tr>
          <th class="th_item">
            性別<span class="caution">※</span>
          </th>
          <td colspan="2">
            <div class="td_radio">
              <input type="radio" value="1" name="gender" checked>
              <span class="radio_item">男性</span>
              <input type="radio" value="2" name="gender">
              <span class="radio_item">女性</span>
            </div>
          </td>
        </tr>
        <tr class="tr_mes">
          <td></td>
          <td colspan="2"></td>
        </tr>

        <tr>
          <th class="th_item">
            メールアドレス<span class="caution">※</span>
          </th>
          <td colspan="2">
            <input type="email" name="email" class="input_form2">
          </td>
        </tr>
        @error('email')
        <tr>
          <td></td>
          <td colspan="2" class="td_error">{{$message}}</td>
        </tr>
        @enderror
        <tr class="tr_mes">
          <td></td>
          <td colspan="2">
            　例）test@example.com
          </td>
        </tr>

        <tr>
          <th class="th_item">
            郵便番号<span class="caution">※</span>
          </th>
          <td colspan="2">
            〒<input type="text" name="post" class="input_form3">
          </td>
        </tr>
        @error('post')
        <tr>
          <td></td>
          <td colspan="2" class="td_error">{{$message}}</td>
        </tr>
        @enderror
        <tr class="tr_mes">
          <td></td>
          <td colspan="2">
            　　例）123-4567
          </td>
        </tr>

        <tr>
          <th class="th_item">
            住所<span class="caution">※</span>
          </th>
          <td colspan="2">
            <input type="text" name="address" class="input_form2">
          </td>
        </tr>
        @error('address')
        <tr>
          <td></td>
          <td colspan="2" class="td_error">{{$message}}</td>
        </tr>
        @enderror
        <tr class="tr_mes">
          <td></td>
          <td colspan="2">
            　例）東京都渋谷区千駄ヶ谷1-2-3
          </td>
        </tr>

        <tr>
          <th class="th_item">建物名</th>
          <td colspan="2">
            <input type="text" name="building" class="input_form2">
          </td>
        </tr>
        <tr class="tr_mes">
          <td></td>
          <td colspan="2">
            　例）千駄ヶ谷マンション101
          </td>
        </tr>

        <tr>
          <th class="th_item">
            ご意見<span class="caution">※</span>
          </th>
          <td colspan="2">
            <textarea name="opinion" class="input_form4"></textarea>
          </td>
        </tr>
        @error('opinion')
        <tr>
          <td></td>
          <td colspan="2" class="td_error">{{$message}}</td>
        </tr>
        @enderror
      </table>

      <div class="div_send">
        <input type="submit" value="確認" class="btn_send">
      </div>
    </form>
  </div>
</body>

</html>