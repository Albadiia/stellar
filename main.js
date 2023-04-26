var table = $('.table-sortable').tableSortable({
    data: stars,
    columns: {
        'id': 'Id',
        'proper': 'Name',
        'x': 'Position X',
        'y': 'Position Y',
        'z': 'Position Z',
        'lum': 'Lumière'
    },
    rowsPerPage: 25,
    pagination: true
});