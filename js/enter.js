var word=$("#word");
var allWord=word.html();
var wordNum=allWord.length;
var num=0;
$(function(){
	word.html("");
	setInterval("wordChange()",250);
});
function wordChange(){
	var txt="";
	for(i=0;i<=num;i++){
		txt+=allWord[i];
	}
	word.html(txt);
	num++;
	if(num>=wordNum){
		num=0;
	}
}