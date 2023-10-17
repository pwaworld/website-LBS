$(document).ready(function () {
  console.log("Career loaded ...Go");


  const dataSet = [
    ['Animator', '1-3 years', 'Full Time'],
    ['Lighting Artist', '1-3 years', 'Full Time'],
    ['Animator 2', '1-3 years', 'Freelancer'],
    ['Animator 1', '1-3 years', 'Full Time'],
    ['3D ANimation ', '4-5 years', 'Freelancer'],
    ['Social Media ', '1-3 years', 'Part Time'],
    ['Animator 3', '2-3 years', 'Full Time'],
    ['Animator 4', '1-3 years', 'Full Time'],

    ['Animator', '1-3 years', 'Full Time'],
    ['Lighting Artist', '1-3 years', 'Full Time'],
    ['Animator 2', '1-3 years', 'Freelancer'],
    ['Animator 1', '1-3 years', 'Full Time'],
    ['3D ANimation ', '4-5 years', 'Freelancer'],
    ['Social Media ', '1-3 years', 'Part Time'],
    ['Animator 3', '2-3 years', 'Full Time'],
    ['Animator 4', '1-3 years', 'Full Time'],


    ['Animator', '1-3 years', 'Full Time'],
    ['Lighting Artist', '1-3 years', 'Full Time'],
    ['Animator 2', '1-3 years', 'Freelancer'],
    ['Animator 1', '1-3 years', 'Full Time'],
    ['3D ANimation ', '4-5 years', 'Freelancer'],
    ['Social Media ', '1-3 years', 'Part Time'],
    ['Animator 3', '2-3 years', 'Full Time'],
    ['Animator 4', '1-3 years', 'Full Time'],

  
  ];


  let table=new DataTable('#example', {
    columns: [
      { title: 'Role' },
      { title: 'Experience' },
      { title: 'Job Type' }
    ],
    data: dataSet,
    info: false,
    searching: false,
    sort:false
  });


  table.on('click', 'tbody tr', function () {
    let data = table.row(this).data();
 
    alert('You clicked on ' + data[0] + "'s row");
});





});

