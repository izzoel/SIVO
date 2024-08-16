<script>
    $(document).ready(function() {
        // Retrieve the saved search value from localStorage
        var savedSearch = localStorage.getItem('datatableSearchValue');
        if (savedSearch) {
            $('.dt-search input[type="search"]').val(savedSearch);
            $('.dt-search input[type="search"]').trigger('input');
        }

        // Save the search value to localStorage on input
        $('.dt-search input[type="search"]').on('input', function() {
            var inputValue = $(this).val();
            localStorage.setItem('datatableSearchValue', inputValue);
            console.log(inputValue);
        });

        // Clear the search value from localStorage when a nav link is clicked
        $('.navbar-nav .nav-link').on('click', function() {
            localStorage.removeItem('datatableSearchValue');
            $.ajax({
                url: "{{ route('purge-cari') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                }
            });
        });
    });
</script>
