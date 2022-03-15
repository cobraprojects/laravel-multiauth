/**
 * You have this:
 * <a href="http://localhost/data/delete/1" data-method="delete" data-confirm="Are you sure?">Delete</a>
 *
 * When above link clicked, below will rendered & triggered:
 * <form method="POST" action="http://localhost/data/delete/1">
 *   <input type="text" name="_token" value="{the-laravel-token}">
 *   <input type="text" name="_method" value="delete">
 * </form>
 *
 * Now you made DELETE request via anchor link.
 */

(function() {

    var LinkSangar = {
        init: function () {
            this.links = document.querySelectorAll('a[data-method]')
            this.registerEvents()
        },

        registerEvents: function () {
            Array.from(this.links).forEach(function (l) {
                l.addEventListener('click', LinkSangar.render)
            })
        },

        render: function (e) {
            var el = this,
                httpMethod,
                form

            httpMethod = el.getAttribute('data-method').toUpperCase()

            // Ignore when the data-method attribute is not PUT or DELETE,
            if (['POST', 'PUT', 'PATCH', 'DELETE'].indexOf(httpMethod) === -1) {
                return;
            }

            // Allow user to optionally provide data-confirm="Are you sure?"
            if (el.hasAttribute('data-confirm') && ! LinkSangar.verifyConfirm(el) ) {
                e.preventDefault()
                return false;
            }

            form = LinkSangar.createForm(el)
            form.submit()

            e.preventDefault()
        },

        verifyConfirm: function (link) {
            return confirm(link.getAttribute('data-confirm'))
        },

        createForm: function (link) {
            var form = document.createElement('form')
            LinkSangar.setAttributes(form, {
                method: 'POST',
                action: link.getAttribute('href')
            })

            var laravelToken = document.querySelector("meta[name=csrf-token]").getAttribute('content');

            if (!laravelToken) {
                console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
            }

            var inputToken = document.createElement('input')
            LinkSangar.setAttributes(inputToken, {
                type: 'hidden',
                name: '_token',
                value: laravelToken
            })

            var inputMethod = document.createElement('input')
            LinkSangar.setAttributes(inputMethod, {
                type: 'hidden',
                name: '_method',
                value: link.getAttribute('data-method').toUpperCase()
            })

            form.appendChild(inputToken)
            form.appendChild(inputMethod)
            document.body.appendChild(form)

            return form
        },

        setAttributes: function (el, attrs) {
            for (var key in attrs) {
                el.setAttribute(key, attrs[key]);
            }
        }
    }

    LinkSangar.init()

})();