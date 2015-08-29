$(document).ready(function () {
   	var tinchi = new Array();
    var diemchu = new Array();
    var mahocphan= new Array();
    var hocky= new Array();
    var i = 2;
    var j = 0;
    while(isElEqual($("#MainContent_gvCourseMarks_DXMainTable tr:nth-child("+i+") td:nth-child(4)").text(),"")==false){
        i++;
        j++;
        tinchi[j] = $("#MainContent_gvCourseMarks_DXMainTable tr:nth-child("+i+") td:nth-child(4)").text();
        diemchu[j] = $("#MainContent_gvCourseMarks_DXMainTable tr:nth-child("+i+") td:nth-child(8)").text();
        mahocphan[j] = $("#MainContent_gvCourseMarks_DXMainTable tr:nth-child("+i+") td:nth-child(2)").text();
        hocky[j] = $("#MainContent_gvCourseMarks_DXMainTable tr:nth-child("+i+") td:nth-child(1)").text();
    }
    var tongtinchi = 0;
    var tongdiem = 0;
    for(var i = 1; i< j; i++){
        var kt =0;
        for(var k = 1; k < i; k++){
            if(isElEqual(mahocphan[k],mahocphan[i])==true){
                if(doidiem(diemchu[i])>doidiem(diemchu[k])){
                    tongdiem=tongdiem+doidiem(diemchu[i])*parseFloat(tinchi[i])-doidiem(diemchu[k])*parseFloat(tinchi[k]);
                }
                kt=1;
            }
        }
        if(kt==0){
            tongtinchi=tongtinchi+parseFloat(tinchi[i]);
            tongdiem=tongdiem+doidiem(diemchu[i])*parseFloat(tinchi[i]);    
        }  
    }
    var cpa = tongdiem/tongtinchi;
    cpa = Math.round(cpa * 100)/100;
    alert("Điểm CPA của bạn là : "+cpa); 
    //day danh sach hoc ky
    var list_hocky=new Array();
    var k=1;
    list_hocky[k]=hocky[1];
    for(var i=1;i<j;i++){
        var kt=0;//khong co trong list
        for(var x=1;x<=k;x++){
            if(isElEqual(hocky[i],list_hocky[x])){
                kt=1;// co trong list
            }
        }
        if(kt==0){
            k++;
            list_hocky[k]=hocky[i];
        }
    }
    // tinh diem gpa tung ky
    var gpa = new Array();
    for(var x=1;x<=k;x++){
        tongdiem=0;
        tongtinchi=0;
        for(var i=1;i<j;i++){
            if(isElEqual(hocky[i],list_hocky[x])){
                tongtinchi=tongtinchi+parseFloat(tinchi[i]);
                tongdiem=tongdiem+doidiem(diemchu[i])*parseFloat(tinchi[i]);
            }
        }
        gpa[x]=tongdiem/tongtinchi;
        gpa[x] = Math.round(gpa[x] * 100)/100;
    }
    var string="";
    for(var x=1;x<=k;x++){
        string=string+"\nĐiểm học kỳ "+list_hocky[x]+" là : "+ gpa[x];
    }   

    alert(string);
    //thong ke diem
    var diem = new Array();
    for (var i = 1; i < 10; i++) {
        diem[i]=0;
    };
    for(var i=1;i<j;i++){
        switch(diemchu[i]){
            case "A+":
                diem[1]++;
                break;
            case "A":
                diem[2]++;
                break;
            case "B+":
                diem[3]++;
                break;
            case "B":
                diem[4]++;
                break;
            case "C+":
                diem[5]++;
                break;
            case "C":
                diem[6]++;
                break;
            case "D+":
                diem[7]++;
                break;
            case "D":
                diem[8]++;
                break;
            case "F":
                diem[9]++;
                break;
        }
    }

    alert("Thống kê điểm:\n\n"+"Số điểm A+ là: "+diem[1]+"\nSố điểm A là: "+diem[2]+"\nSố điểm B+ là: "+diem[3]+"\nSố điểm B là: "+diem[4]+"\nSố điểm C+ là: "+diem[5]+"\nSố điểm C là: "+diem[6]+"\nSố điểm D+ là: "+diem[7]+"\nSố điểm D là: "+diem[8]+"\nSố điểm F là: "+diem[9]);

    
});


function doidiem(value){
    if(typeof value != 'undefined'){
        switch(value){
            case "A":
            case "A+":
                return 4;
            case "B+":
                return 3.5;
            case "B":
                return 3;
            case "C+":
                return 2.5;
            case "C":
                return 2;
            case "D+":
                return 1.5;
            case "D": 
                return 1;
            case "F":
                return 0;
        }
    }
}

function isElEqual(value1, value2)
{
    if( typeof value1 != 'undefined' )
    {
        if( value1 ==  value2)
        {
            return true;
        }
    }
    return false;
}
