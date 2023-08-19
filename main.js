const btn_cadastrar =  document.querySelector('#btn-ca')
const btn_relatorio = document.querySelector('#btn-re')

btn_cadastrar.addEventListener('click', ()=>{
    location.href = "cadastro.php";
})

btn_relatorio.addEventListener('click', () => {
    location.href = 'relatorio.html'
})