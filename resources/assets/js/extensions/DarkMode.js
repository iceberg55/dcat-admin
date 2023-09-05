
export default class DarkMode {
    constructor() {
        this.options = {
            selector: '',
            class: 'muze-dark-mode',
            icons: {
                light: 'fa-moon',
                dark: 'fa-sun',
            }
        }

        this.initSwitcher('.dark-mode-switcher');
    }

    initSwitcher (selector) {
        let darkMode = this;
        this.options.selector = selector;
        this.setDarkMode(this.getDarkMode());

        $(document).on('click', this.options.selector, function () {
            darkMode.toggle();
        });

        window.addEventListener('storage', function (event) {
            if (event.key === key) {
                darkMode.setDarkMode(event.newValue);
            }
        });
    }

    getDarkMode() {
        var storage = localStorage || {setItem:function () {}, getItem: function () {}},
            storageKey = 'theme-dark-mode';

        return storage.getItem(storageKey);
    }
    setDarkMode(color) {console.log
        var storage = localStorage || {setItem:function () {}, getItem: function () {}},
            storageKey = 'theme-dark-mode';

        switch (color){
            case 'light':
                storage.setItem(storageKey, color);
                $('body').removeClass(this.options.class);
                $(this.options.selector).find('i')
                    .removeClass(this.options.icons.dark)
                    .addClass(this.options.icons.light);
                break;
            case 'dark':
                storage.setItem(storageKey, color);
                $('body').addClass(this.options.class);
                $(this.options.selector).find('i')
                    .removeClass(this.options.icons.light)
                    .addClass(this.options.icons.dark);
                break;
            default:
                this.setDarkMode('light');
                break;
        }
    }

    toggle() {
        let darkMode = this.getDarkMode();
        if (!darkMode || darkMode === 'light') {
            this.setDarkMode('dark');
        } else {
            this.setDarkMode('light');
        }
    }
}