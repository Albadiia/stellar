var table = $('.table-sortable').tableSortable({
    data: stars,
    columns: {
        'formCode': 'Form Code',
        'formName': 'Form Name',
        'fullName': 'Full Name',
        'appointmentDate': 'Appointment Date',
        'appointmentTime': 'Appointment Time',
        'phone': 'Phone'
    },
    rowsPerPage: 25,
    pagination: true
});