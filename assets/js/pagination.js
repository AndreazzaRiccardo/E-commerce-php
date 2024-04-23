let currentPage = '<? php echo $currentPage; ?>';
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("prevPage").addEventListener("click", function () {
        var currentPage = parseInt(document.getElementById("page").value);
        if (currentPage > 1) {
            document.getElementById("page").value = currentPage - 1;
            document.getElementById("paginationForm").submit();
        }
    });

    document.getElementById("nextPage").addEventListener("click", function () {
        var currentPage = parseInt(document.getElementById("page").value);
        document.getElementById("page").value = currentPage + 1;
        document.getElementById("paginationForm").submit();
    });
});