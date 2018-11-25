function calculateBmi() {
  var weight = document.bmiForm.weight.value
  var height = document.bmiForm.height.value.replace('.', '')
  if(weight > 0 && height > 0){
    var finalBmi = weight/(height/100*height/100)
    var finalBmi = Math.round(finalBmi);


    document.bmiForm.bmi.value = finalBmi
    if(finalBmi < 18.5){
      document.bmiForm.meaning.value = "That you are too thin."
    }
    if(finalBmi > 18.5 && finalBmi < 25){
      document.bmiForm.meaning.value = "That you are healthy."
    }
    if(finalBmi > 25){
      document.bmiForm.meaning.value = "That you have overweight."
    }
  }
  else{
    alert("Please Fill in everything correctly")
  }
}

calculateBmi();
