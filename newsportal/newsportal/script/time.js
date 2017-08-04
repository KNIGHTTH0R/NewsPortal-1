function updateTime(){
    var currentTime = new Date()
    var hours = currentTime.getHours()
    var minutes = currentTime.getMinutes()
    var second=currentTime.getSeconds()
    if (minutes < 10){
        minutes = "0" + minutes
    }
    if (second < 10){
        second = "0" + second
    }
    var t_str = hours + ":" + minutes + ":"+second+" ";

    document.getElementById('time_span').innerHTML = t_str;
}
setInterval(updateTime, 10);


