var months = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEPT", "OCT", "NOV", "DEC" ];

function dateString(day, month, year) {
    var date = "";
    
    if (day.length !== 0 ) {
        year = year.substring(2,4);
        if (day.length === 1) {
            day = "0" + day + "-";
        } else {
            day += "-";
        }
        date += day;
    }
    if (month.length !== 0) {
        if (day.length === 0) {
            month = months[month - 1];
        }
        date += (month + "-");
    }
    
    date += year;
    
    return date;
}

