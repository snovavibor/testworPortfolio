$(document).ready(function () {

    $('#display').val('0');

    /**
       * запрет на ввод с клавиатуры в поле дисплея
       */
    $('#display').on('keypress', function (e) {
        e.preventDefault();
    })

    /**
     * очищает дисплей (кнопка сброс)
     */
    function clearDisplay() {

        $('#display').val('0');
    }

    /**
     * возвращает строку дисплея на текущий момент
     */
    function getStringDisplay() {

        return $('#display').val();
    }

    /**
     * печатает символы на дисплей
     * (создвает строку)
     * 
     * @param {string} num 
     */
    function renderNumberToDisplay(num) {

        var oldNum = getStringDisplay();

        if (oldNum !== '0') {
            $('#display').val(oldNum + num);
        } else {

            $('#display').val(num);
        }

    }

    /**
     * возвращает последний символ в строке
     * 
     * @param {string} str 
     */
    function lastSymbol(str) {

        return str.slice(-1);
    }

    /**
     * проверяет является ли параметр числом
     * 
     * @param {string} params 
     */
    function isNumeric(params) {

        if (parseFloat(params) || params == '0') {
            return true;
        }
        return false;
    }

    /**
    * Производит подсчет элементов в массиве
    * 
    * @param {array} arr 
    */
    function counterArr(arr) {

        let counter = 0;

        for (let elem of arr) {
            if (isNumeric(elem)) {
                counter++;
            }
        }

        return counter;

    }

    /**************************************************************************************************************************************
     * ************************************************************************************************************************************
     * 
     * Основной механизм работы калькулятора
     */


    //устанавливает событие на клик кнопок в блоке с id="calc-btn"
    $('#calc-btn button').on('click', function (event) {
        var el = event.target;
        var num = $(el).val();

        //механизм отработки нажатия на сброс на калькуляторе
        //очистка дисплея и установка 0 на экране
        if (num == 'C') {
            clearDisplay();
            return;
        }

        //механизм отработки при нажатии на =
        if (num == '=') {

            //сохраняется текущее остояние строки на дисплее
            //к примеру: если на экране только '/', при нажатии на '=' должен появится 0
            var tempStr = getStringDisplay();

            //если на экране присуствуют не только знаки без чисел
            if (isNumeric(tempStr)) {

                //определяется знак который находится между двумя аргументами
                var sign = searchSign(tempStr);

                //строка делится на два аргумента (одно число и второе)
                //помещается в массив для дальнейшей передачи в result() 
                //чтобы произвести над ними арифметические действия
                var ar = makeArguments(sign, tempStr);

                //аргументы передаются для произведения над ними арифметических вычеслений согласно нажатой кнопке действия
                //т.е. результат главный
                var res = result(sign, ar);

                //отображается результат на экран как строка уже
                $('#display').val(res);
                return;

            } else if (!isNumeric(tempStr)) {
                clearDisplay();
                return;
            }

            return;
        }

        //если приходит число, от пользоваетля, то сразу печатается на экран
        if (isNumeric(num)) {

            renderNumberToDisplay(num);

            return;
        }

        //возможность замены знака на другой
        if (!isNumeric(num)) {

            notRepeatSign(num);
        }

        //печатает знак после первого аргумента
        //который определит арифметическое действие между ними
        signs(num);


    })


    /**
     * 
     * @param {string} num 
     */
    function signs(num) {

        var str = getStringDisplay();

        var sign = searchSign(str);

        if (isNumeric(lastSymbol(str))) {

            var arg = makeArguments(sign, str);

            var res = result(sign, arg);

            clearDisplay();

            $('#display').val(res);

            if (num !== '=') {
                renderNumberToDisplay(num);
                return;
            }


        }


    }

    /**
     * делает массив аргументов для дальнейшего выполнения арифметического действия
     * в масииве ожидается два элемента, если получается только один
     * то добавляется один элемент со значением 0.
     * 
     * @param {string} sign 
     * @param {string} str 
     */
    function makeArguments(sign, str) {

        var arrstr = str.split(sign);


        if (counterArr(arrstr) == 1) {

            var counSign = 0;
            var posSign = 0;
            for (var i = 0; i < arrstr[0].length; i++) {

                if (arrstr[0][i] == '-') {
                    counSign++;
                    posSign = i;

                }

            }
            if (counSign > 1) {
                tempStr = arrstr[0];
                tempStr = tempStr.substr(0, posSign) + ',' + tempStr.substr(posSign);
                arrstr[0] = tempStr;
                newstr = arrstr[0].split(',');
                arrstr = newstr;
            }

        }


        //приводит строковое состояние элементов массива в число
        var out = arrstr.map(function (el) {

            return parseFloat(el);

        });

        //в случае когда есть только один элемент в масиве (когда нажат один аргумент и знак '=')
        //добавляет элемент с 0 для того чтобы отобразить результат на экране (или 0 или само то число в зависимости от условия)
        if (counterArr(out) == 1) {
            out[1] = 0;
        }

        return out;

    }


    /**
     * Производит арифметические вычисления согласно действиям на калькуляторе
     * 
     * @param {string} sign 
     * @param {array} arr 
     */
    function result(sign, arr) {
        switch (sign) {
            case '+':
                return arr[0] + arr[1];
            case '-':
                return arr[0] - arr[1];
            case '*':
                return arr[0] * arr[1];
            case '/':
                return arr[0] / arr[1];


        }

    }

    /**
     * Определяет наличие знака в уже сущесвтующей строке на дисплее.
     * Если находит больше двух знаков то оставляет только один, то что в конце (для вычислений со знаком -).
     * 
     * 
     * @param {string} str 
     */
    function searchSign(str) {

        //возвращает только знак или знаки
        let sign = (str.replace(/[0-9.]/g, ""));

        //если больше одного знака оставить один крайний
        if (sign.length > 1) {
            sign = sign[sign.length - 1];
        }

        //если нет знака то по умолчанию сделать +
        //для того чтобы, при нажатии на '=' оставалось число на дисплее, если оно только одно 
        if (sign == '') {
            return "+";
        }

        //если '-' стоит первым то означает что это отрицательное число,
        //а не призыв к действию начать вычисление разности
        if (sign == '-' && str.indexOf("-") == '0') {

            $('#display').val('-');

            return '+';
        }

        return sign;

    }


    /**
     * не допускает дублирования знаков,
     * заменяет знак на другой
     * 
     * @param {*} num 
     */
    function notRepeatSign(num) {

        var str = getStringDisplay();

        var lastSym = lastSymbol(str);

        if (!$.isNumeric(lastSym)) {

            nstr = str.substring(0, str.length - 1);

            $('#display').val(nstr);
        }

    }



})