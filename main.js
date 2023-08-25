const btn_cadastrar =  document.querySelector('#btn-ca')
const btn_relatorio = document.querySelector('#btn-re')

btn_cadastrar.addEventListener('click', ()=>{
    location.href = "pages/register.php";
})

btn_relatorio.addEventListener('click', () => {
    location.href = 'pages/report.php'
})