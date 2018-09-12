function logincheck()
	{
		var temp1=document.forms["inputs"]["email"].value;
		var temp2=document.forms["inputs"]["password"].value;
		if(temp2=="" || temp1=="")
      {
        alert("Please fill all the fields");
        return false;
      }
      else
      	alert("Logged in...yay!!")
	}