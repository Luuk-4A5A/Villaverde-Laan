let arrayItems = [
  [9, 21, 14],
  [11, 5, 27],
  [29, 17, 6],
];

function arrayObj(arrayParam) {
  var arrayObj = {};

  arrayObj.array = arrayParam;

  arrayObj.countArrayRow = function(number) {
    var awnser = 0;
    this.array.forEach((value, index, arr) => {
      if(index === number) {
        awnser = this.countArrayUp(value);
      }
    });
    return awnser;
  }

  arrayObj.countAllInArray = function() {
    var awnser = 0;
    this.array.forEach((value, index, arr) => {
      awnser += this.countArrayUp(value);
    });
    return awnser;
  }


  //add countArrayUp to object to count all the array items up.
  arrayObj.countArrayUp = function(array) {
    var awnser = 0;
    for(var i = 0; i < array.length; i++) {
      awnser += array[i];
    }
    return awnser;
  }

  arrayObj.arrayToTable = function(options = {}) {
    var string = (options.classes) ? '<table class="' + options.classes + '">' : '<table>';
    for(var i = 0; i < this.array.length; i++) {
      string += '<tr>';
      for(var j = 0; j < this.array[i].length; j++) {
        string += '<td>' + this.array[i][j] + '</td>';
      }
      string += '</tr>';
    }
    string += '</table>';

    return string;
  }

//return full object
  return arrayObj;
}

var arrayobject = arrayObj(arrayItems).arrayToTable({classes : 'class1 class2'});

document.querySelector('#result').innerHTML = arrayobject;














//wd
