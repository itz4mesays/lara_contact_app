document.getElementById('company_id').addEventListener('change', function() {
    let companyId = this.value || this.options[this.selectedIndex].value
    window.location.href = window.location.href.split('?')[0] + '?company_id=' + companyId
})

document.getElementById('btn-clear').addEventListener('click', function() {
    let input = document.getElementById('search'),
        select = document.getElementById('company_id')

        input.value = ""
        select.selectedIndex = 0

       window.location.href = window.location.href.split('?')[0]
})

const toggleClearBtn = () => {
    //the patten will match  ?company_id=1&search
    let query = location.search,
        pattern = /[?&]search=/,
        button = document.getElementById('btn-clear')

    if(pattern.test(query)){
        button.style.display = "block"
    }else{
        button.style.display = "none"
    }
}

toggleClearBtn()