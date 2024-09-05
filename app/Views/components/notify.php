<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css">

<style>
    .success-icon {
        content: url('<?= base_url() ?>/success.svg');
        position: relative;
        width: 30px;
        margin-left: -5px;
        margin-top: -1px;
    }

    .notyf__wrapper {
        background-color: #fff;
        color: #000;
        width: 100%;
        border-radius: 100px;
        height: auto;
        font-size: 15px;
        padding: 3px 0px;
    }

    .notyf__toast--success {
        border-radius: 100px;
        height: auto;
    }

    .notyf__toast--success .notyf__message {
        font-size: 15px;
        font-weight: 500;
    }

    .error-icon {
        content: url('<?= base_url() ?>/error.svg');
        position: relative;
        width: 30px;
        margin-left: -5px;
        margin-top: -1px;
    }

    .notyf__toast--error {
        border-radius: 100px;
        height: auto;
    }

    .notyf__toast--error .notyf__message {
        font-size: 15px;
        font-weight: 500;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>


<script>
    // Initialize Notyf
    const notyf = new Notyf({
        duration: 2000,
        ripple: true,
        position: {
            x: 'center',
            y: 'top',
        },
        types: [{
                type: 'info',
                background: '#3b97d3',
                icon: {
                    className: 'fas fa-info-circle',
                    tagName: 'span',
                    color: '#fff'
                }
            },
            {
                type: 'error',
                background: '#fff',

                icon: {
                    className: 'error-icon',
                    tagName: 'img',
                }
            },
            {
                type: 'success',
                background: '#fff',
                icon: {
                    className: 'success-icon',
                    tagName: 'img',
                }
            },
            {
                type: 'warning',
                background: '#f9c851',
                icon: {
                    className: 'fas fa-exclamation-triangle',
                    tagName: 'span',
                    color: '#fff'
                }
            }
        ]
    });
</script>

<script>
        function notify(type, message) {
            notyf.open({
                type: type,
                message: message
            });
        }

        document.addEventListener('htmx:afterRequest', function(evt) {
            if(evt.detail.xhr.status == 200) {
                notify('success', JSON.parse(evt.detail.xhr.response).message)
                setInterval(() => {
                    location.href = JSON.parse(evt.detail.xhr.response).redirect
                }, 2000);
                
            } else {
                notify('error', JSON.parse(evt.detail.xhr.response).message)
            }
        });

    </script>