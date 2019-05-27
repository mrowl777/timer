<head>
    <title>На счетчик!</title>
    <link href="css/index.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <script src="js/jquery-3.4.0.js"></script>
    <script src="js/index.js"></script>
</head>
<body>
<div class="welcome">
    <h1> Не отдают долг? </h1>
    <h3>Надоело хранить должников в блокнотике?</h3>
    <h3>Лень самостоятельно считать сколько уже накапало сверху?</h3>
    <p>Тогда наш сервис создан специально для вас. </p>
    <p>Просто задайте нужные параметры, добавьте сайт в закладки (CTRL+D) и периодически наслаждайтесь цифрами</p>
    <p>Должник уже записан? <a href="#" id="_add">Введи погоняло!</a>
    <input type="text" class="add_field hidden" >
    </p>
</div>

<div class="content">
    <div class="block">
            <p>Погоняло?</p>
            <input type="text" id="name" autocomplete="off" required>
    </div>
    <div class="block">
        <p>С какого числа терпила торчит?</p>
        <input type="date" id="start" name="trip-start" required>
    </div>
    <div class="block">
        <p>Много? Укажи сумму в деревянных</p>
        <input type="number" id="count" required>
    </div>
    <div class="block">
        <p>Как обдирать будем? Каждый ..</p>
        <select id="period_type">
            <option value="day">день</option>
            <option value="week">неделю</option>
            <option value="month">месяц</option>
        </select>
    </div>
    <div class="block">
        <p >Как считать будем? Каждый период + ..</p>
        <select id="count_type">
            <option value="percent">% от начальной суммы</option>
            <option value="percent_cur">% от текущей суммы</option>
            <option value="fix">определенная сумма</option>
        </select>
    </div>
    <div class="block" id="percents_block">
        <p>По сколько?</p>
        <select>
            <option value="3">3%</option>
            <option value="5">5%</option>
            <option value="7">7%</option>
            <option value="10">10%</option>
            <option value="15">15%</option>
            <option value="20">20%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
            <option value="75">75%</option>
        </select>
    </div>
    <div class="block hidden" id="summ_block" >
        <p>По сколько?</p>
        <input type="number" id="every_summ" placeholder="Введите сумму">
    </div>
    <button id="submit">Подписать приговор</button>
</div>

<div class="d_table hidden">
    <table class="tftable" border="1">
    <tr>
        <th>Погоняло</th>
        <th>Дата залета</th>
        <th>Торчит</th>
        <th>Снимаем по</th>
        <th>Всего должен</th>
        <th>Отдал</th>
        <th>Действие</th>
    </tr>
    </table>
</div>

<div class="footer">
    <p><a href="http://t-do.ru/nobody9988" target="_blank">@mrowl</a></p>
</div>
</body>