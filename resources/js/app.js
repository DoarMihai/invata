import './bootstrap';

function processSlug(titleId, slugId) {
    let title = document.getElementById(titleId);
    title.addEventListener("keyup", function (e){
        let value = $(this).val();

        let slug = value
            .toString()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .toLowerCase()
            .trim()
            .replace(/\s+/g, '-')
            .replace(/[^\w-]+/g, '')
            .replace(/--+/g, '-')

        document.getElementById(slugId).value = slug;
    });
}
