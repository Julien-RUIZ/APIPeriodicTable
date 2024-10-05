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
    const ButtonRadioactif = document.querySelector('.BlocRadioactif')
    ButtonRadioactif.addEventListener('click', function () {
        const ButtonActionRadioactif = document.querySelector('.Radioactifspace')
        if (ButtonActionRadioactif.style.display === 'none')
            ButtonActionRadioactif.style.display='inherit'
        else {
            ButtonActionRadioactif.style.display='none'
        }
    })
}
