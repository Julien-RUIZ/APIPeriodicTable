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
            const ButtonActionRadioactif = document.querySelector('.Radioactifspace')
            const ButtonActionCategory = document.querySelector('.CategoryList1')
            const ButtonActionState = document.querySelector('.ChemicalStateList')

            if (e.currentTarget.classList.contains('BlocRadioactif') && ButtonActionRadioactif.style.display === 'none'){
                ButtonActionRadioactif.style.display='inherit'
                ButtonActionCategory.style.display='none'
                ButtonActionState.style.display='none'
            }else if (e.currentTarget.classList.contains('BlocRadioactif') && ButtonActionRadioactif.style.display === 'inherit') {
                    ButtonActionRadioactif.style.display = 'none'
            }
            if(e.currentTarget.classList.contains('BlocCatégories') && ButtonActionCategory.style.display === 'none'){
                ButtonActionCategory.style.display='inherit'
                ButtonActionState.style.display='none'
                ButtonActionRadioactif.style.display='none'
            }else if (e.currentTarget.classList.contains('BlocCatégories') && ButtonActionCategory.style.display === 'inherit') {
                ButtonActionCategory.style.display = 'none'
            }
            if(e.currentTarget.classList.contains('BlocChemicalState') && ButtonActionState.style.display === 'none'){
                ButtonActionState.style.display='inherit'
                ButtonActionCategory.style.display='none'
                ButtonActionRadioactif.style.display='none'
            }else if(e.currentTarget.classList.contains('BlocChemicalState') && ButtonActionState.style.display === 'inherit'){
                ButtonActionState.style.display='none'
            }
        })
    })
}
