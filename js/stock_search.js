var workingBG = false;
function search() {
    pathName = $('#pathName').val();
    $.post(pathName + 'search', {search: $('#search-input').val()}, function (data) {
        console.log(data);
        updateDropDown(data.data);
    }, 'json');
}

function updateDropDown(data) {
    var HtnlContent = "";
    $('.names').empty();
    for (var stockData in data) {
        var stockDataObj = data[stockData];
        var name = stockDataObj['name'];
        HtnlContent += ('<li>' + name + '</li>');
    }
    $('.names').append(HtnlContent);
}