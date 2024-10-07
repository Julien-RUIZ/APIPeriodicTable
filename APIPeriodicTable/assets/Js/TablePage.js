export function Tooltip(){
const td = document.querySelectorAll('.tdTable')
    td.forEach(tdTable => {
        tdTable.addEventListener('pointerover', function (e) {
            const nom = e.currentTarget.querySelector('.nom').textContent
            const symbol = e.currentTarget.querySelector('.symbole').textContent
            const Namespace = document.querySelector('.ElementTooltip')
            Namespace.innerHTML = symbol + ' - ' + nom
        })
    })
}

export function ButtonSelectionSpace(){
    const Buttonfilter = document.querySelectorAll('.ButtonFilterTable')
    Buttonfilter.forEach(ButtonFilterTable=>{
        ButtonFilterTable.addEventListener('click', function (e) {
            console.log(e.currentTarget)
            if (e.currentTarget.classList.contains('BlocRadioactif')){
                const ButtonActionRadioactif = document.querySelector('.Radioactifspace')
                if (ButtonActionRadioactif.style.display === 'none')
                    ButtonActionRadioactif.style.display='inherit'
                else {
                    ButtonActionRadioactif.style.display='none'
                }
            }else if(e.currentTarget.classList.contains('BlocCatégories')){
                const ButtonActionCategory = document.querySelector('.CategoryListe1')
                if (ButtonActionCategory.style.display === 'none')
                    ButtonActionCategory.style.display='inherit'
                else {
                    ButtonActionCategory.style.display='none'
                }
            }
        })
    })
}




export function ButtonSelectionSpace2(){
    const Buttonfilter = document.querySelectorAll('.ButtonFilterTable')
    Buttonfilter.forEach(ButtonFilterTable=>{
        ButtonFilterTable.addEventListener('click', function (e) {
            console.log(e.currentTarget)
            if (e.currentTarget.classList.contains('BlocRadioactif')){
                const ButtonActionRadioactif = document.querySelector('.Radioactifspace')
                if (ButtonActionRadioactif.style.display === 'none')
                    ButtonActionRadioactif.style.display='inherit'
                else {
                    ButtonActionRadioactif.style.display='none'
                }
            }else if(e.currentTarget.classList.contains('BlocCatégories')){
                const ButtonActionCategory = document.querySelector('.CategoryListe1')
                if (ButtonActionCategory.style.display === 'none')
                    ButtonActionCategory.style.display='inherit'
                else {
                    ButtonActionCategory.style.display='none'
                }
            }
        })
    })
}