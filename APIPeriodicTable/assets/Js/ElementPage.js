export function ButtonDefElement(){
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('show-info')){
            e.target.classList.add('ColorSelection');
            const data = e.target.getAttribute('data-target')
            const targetId = document.getElementById(data)
            if (targetId.style.display === 'none'){
                targetId.style.display = 'table-cell';
            }else{
                targetId.style.display = 'none';
                e.target.classList.remove('ColorSelection')
            }
        }
    })
}