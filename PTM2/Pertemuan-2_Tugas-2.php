<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Kalkulator</title>
</head>
<style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        background-color: rgb(229, 255, 0);
    }

    .container {
        text-align: center;
    }

    input, select {
        width: 200px;
        height: 30px;
        font-size: 20px;
        margin-bottom: 10px;
    }

    input[type="button"] {
        cursor: pointer;
    }

    p {
        color: red;
        font-size: 25px;
    }
</style>
<body>
    <script>
        function calculate() {
            var nilai1 = parseFloat(document.getElementById('inputNilai1').value);
            var nilai2 = parseFloat(document.getElementById('inputNilai2').value);
            var operator = document.fform.operator.value;

            var result;

            switch (operator) {
                case '+':
                    result = nilai1 + nilai2;
                    break;
                case '-':
                    result = nilai1 - nilai2;
                    break;
                case '*':
                    result = nilai1 * nilai2;
                    break;
                case '/':
                    result = nilai1 / nilai2;
                    break;
                case '^':
                    result = Math.pow(nilai1, nilai2);
                    break;
                default:
                    result = 'Invalid Operator';
                    break;
            }

            document.getElementById('result').value = result;
        }
    </script>
    <form name="fform" method="post">
        <div style="font-size: 25px;" class="container">Kalkulator Sederhana</div>
        <p Align="right" style="font-size: 25px;">Selamat mencoba</p>
        <p Align="left" style="font-size: 25px;" Align="right">Nilai 1 </p>
        <div class="container">
            <input type="text" name="inputNilai1" id="inputNilai1" size="30">
            <select name="operator" size="1">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
                <option value="^">^</option>
            </select>
            <p Align="left" style="font-size: 25px;" Align="right">Nilai 2</p>
            <input type="text" name="inputNilai2" id="inputNilai2" size="30">
            <input type="button" value="Submit" onclick="calculate()">
        </div>
        <p>Hasil: <input type="text" name="result" id="result" size="30" readonly></p>
    </form>
</body>
</html>