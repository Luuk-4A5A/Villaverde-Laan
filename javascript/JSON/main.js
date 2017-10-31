var result = {
    "employees": [
        {
            "id" : 1,
            "firstname" : "Nico",
            "lastname" : "Boer"
        },
        {
            "id" : 2,
            "firstname" : "Tim",
            "lastname" : "Jansen"
        },
        {
            "id" : 3,
            "firstname" : "Pim",
            "lastname" : "Vosse"
        }
    ]
};


//1: array

result.employees.forEach((value, index, array) => {
  if(value.id === 2) {
    console.log(value.firstname);
    console.log(value['firstname']);
  }

  if(value.firstname === 'Nico') {
    console.log(value.firstname);
  }

  if(value.firstname === 'Pim' && value.lastname === 'Vosse') {
    console.log(value.id);
  }

  if(value.firstname === 'Tim' && value.lastname === 'Jansen') {
    delete value.firstname;
    console.log(value);
  }

  value.permanentContract = true;
});


console.log(result.employees);
