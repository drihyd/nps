/*
---------------------------------------
    : Custom - Form X-editable js :
---------------------------------------
*/
"use strict";
// $(document).ready(function() {
//     /* -- Form - X-editable -- */   
//     $.fn.editable.defaults.mode = 'inline';
//     $.fn.editableform.buttons='<button type="submit" class="btn btn-success editable-submit btn-sm"><i class="mdi mdi-check"></i></button><button type="button" class="btn btn-danger editable-cancel btn-sm"><i class="mdi mdi-close"></i></button>';
//     $('#xeditable-username').editable({
//         type: 'text',
//         pk: 1,  
//         title: 'Enter username',
//         inputclass: 'form-control form-control-sm'
//     });
// 	$('#xeditable-username1').editable({
//         type: 'text',
//         pk: 1,  
//         title: 'Enter username',
//         inputclass: 'form-control form-control-sm'
//     });
// 	$('#xeditable-entitytype').editable({
//         type: 'text',
//         pk: 1,  
//         title: 'Enter Entity Type',
//         inputclass: 'form-control form-control-sm disabled',
//     });
// 	$('#xeditable-address1').editable({
//         type: 'text',
//         pk: 1,  
//         title: 'Enter addressline1',
//         inputclass: 'form-control form-control-sm'
//     });
// 	$('#xeditable-address2').editable({
//         type: 'text',
//         pk: 1,  
//         title: 'Enter addressline2',
//         inputclass: 'form-control form-control-sm'
//     });
// 	$('#xeditable-pincode').editable({
//         type: 'text',
//         pk: 1,  
//         title: 'Enter pincode',
//         inputclass: 'form-control form-control-sm'
//     });
// 	$('#xeditable-city').editable({
//         type: 'text',
//         pk: 1,  
//         title: 'Enter City',
//         inputclass: 'form-control form-control-sm'
//     });
//     $('#xeditable-firstname').editable({
//         type: 'text',
//         pk: 1, 
//         placement: 'right',
//         placeholder: 'Required',
//         title: 'Enter your firstname',  
//         inputclass: 'form-control form-control-sm',
//         validate: function(value) {
//            if($.trim(value) == '') return 'This field is required';
//         }
//     });
//     $('#xeditable-country').editable({
//         prepend: 'not selected',
//         type: 'select',
//         pk: 1,
//         value: '1',
//         title: 'India',
//         source: [
//             {value: 1, text: 'India'},
//             {value: 2, text: 'Afghanistan'},
// 			{value: 3, text: 'Angola'},
// 			{value: 4, text: 'Africa'},
// 			{value: 5, text: 'Algeria'},
// 			{value: 6, text: 'Italy'},
// 			{value: 7, text: 'United States'},
// 			{value: 8, text: 'United Kingdom'},
// 			{value: 9, text: 'Uzbekistan'},
			
//         ],
//         inputclass: 'form-control form-control-sm',
//         display: function(value, sourceData) {
//              var colors = {"": "#777777", 1: "#2bcd72", 2: "#4c7cf3"},
//                  elem = $.grep(sourceData, function(o){return o.value == value;});
                 
//              if(elem.length) {    
//                  $(this).text(elem[0].text).css("color", colors[value]); 
//              } else {
//                  $(this).empty(); 
//              }
//         }   
//     });
//     $('#xeditable-status').editable({
//           type: 'select',
//           pk: 1,
//           value: '0',   
//           title: 'Select Status',
//           inputclass: 'form-control form-control-sm'
//     });
//     $('#xeditable-dob').editable({
//           type: 'combodate',
//           pk: 1,
//           value: '2018-10-25',
//           title: 'Select date',
//           format: 'YYYY-MM-DD',    
//           viewformat: 'DD.MM.YYYY',    
//           template: 'D / MMMM / YYYY',    
//           combodate: {
//                minYear: 2000,
//                maxYear: 2015,
//                minuteStep: 1
//           },
//           inputclass: 'form-control form-control-sm'
//      });
//      $('#xeditable-event').editable({
//         type: 'combodate',
//         pk: 1,  
//         title: 'Setup event date and time',
//         placement: 'right',
//         format: 'YYYY-MM-DD HH:mm',    
//         viewformat: 'MMM D, YYYY, HH:mm',    
//         template: 'D MMM YYYY  HH:mm',
//         combodate: {
//             firstItem: 'name'
//         },
//         inputclass: 'form-control form-control-sm'
//     });
//     $('#xeditable-comments').editable({
//         title: 'Enter comments',
//         rows: 5,
//         inputclass: 'form-control form-control-sm'
//     });     
//     $('#xeditable-checklist').editable({
//         type: 'checklist',
//         pk: 1,  
//         title: 'Select options',
//         value: [1],    
//         source: [
//               {value: 1, text: 'option1'},
//               {value: 2, text: 'option2'},
//               {value: 3, text: 'option3'}
//            ]
//     });
// });