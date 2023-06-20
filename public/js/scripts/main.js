const btn = document.querySelector("#calcular");
let calc = new Calculadora();
btn.addEventListener("click", function (e) {
    
    e.preventDefault();
    const valor = document.querySelector("#valorini");
    const txpoupanca = document.querySelector("#txpoupanca");
    const txselic = document.querySelector("#txselic");
    const txcdb = document.querySelector("#txcdb");
    var select = document.getElementById('time');
    calc.c = valor.value;
    calc.txP = txpoupanca.value;
    calc.txSel = txselic.value;
    calc.txCDB = txcdb.value;
    calc.i = select.options[select.selectedIndex].value;
    var resPoup = calc.calcularPoup().toLocaleString('pt-BR',{style: 'currency', currency : 'BRL'});
    var resSelic = calc.calcularSel().toLocaleString('pt-BR',{style: 'currency', currency : 'BRL'});
    var resCDB = calc.calcularCDB().toLocaleString('pt-BR',{style: 'currency', currency : 'BRL'});
    document.getElementById('valorpoupanca').value = resPoup;
    document.getElementById('valorselic').value = resSelic;
    document.getElementById('valorcdb').value = resCDB;
    console.log(calc.c);
    console.log(calc.i);
    console.log(calc.calcularPoup());
    console.log(calc.calcularSel());
    console.log(calc.calcularCDB());
});
