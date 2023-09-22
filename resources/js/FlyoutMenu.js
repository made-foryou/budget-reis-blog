const SELECTOR = '[data-flyout]';
const SELECTOR_TRIGGER = '[data-trigger]';
const SELECTOR_TRIGGER_ICON = '[data-icon]';
const SELECTOR_MENU = '[data-menu]';

export default class FlyoutMenu {
    /**
     * @param {Element} element
     */
    constructor(element) {
        /**
         * The element for the FlyoutMenu
         * @type {Element}
         * @private
         */
        this._element = element;

        /**
         * @type {Element}
         * @private
         */
        this._trigger = this._element.querySelector(SELECTOR_TRIGGER);

        /**
         * @type {Element}
         * @private
         */
        this._triggerIcon = this._trigger.querySelector(SELECTOR_TRIGGER_ICON);

        /**
         * @type {Element}
         * @private
         */
        this._menu = this._element.querySelector(SELECTOR_MENU);

        /**
         * @type {boolean}
         * @private
         */
        this._state = this._menu.classList.contains('opacity-100');

        this._trigger.addEventListener('click', this.toggle.bind(this));
    }

    toggle() {
        if (this._state) {
            this.close();
        } else {
            this.open();
        }
    }

    open() {
        if (!this._menu.classList.contains('ease-out')) {
            this._menu.classList.remove('ease-in');
            this._menu.classList.add('ease-out');
        }

        if (!this._menu.classList.contains('duration-200')) {
            this._menu.classList.remove('duration-150');
            this._menu.classList.add('duration-200');
        }

        this._triggerIcon.classList.replace('rotate-0', 'rotate-180');
        this._menu.classList.replace('opacity-0', 'opacity-100');
        this._menu.classList.replace('-translate-y-1', 'translate-y-0');

        window.setTimeout(() => this._state = true, 200);
    }

    close() {
        if (!this._menu.classList.contains('ease-in')) {
            this._menu.classList.remove('ease-out');
            this._menu.classList.add('ease-in');
        }

        if (!this._menu.classList.contains('duration-150')) {
            this._menu.classList.remove('duration-200');
            this._menu.classList.add('duration-150');
        }

        this._triggerIcon.classList.replace('rotate-180', 'rotate-0');
        this._menu.classList.replace('opacity-100', 'opacity-0');
        this._menu.classList.replace('translate-y-0', '-translate-y-1');

        window.setTimeout(() => this._state = false, 150);
    }

    static start() {
        const elements = document.querySelectorAll(SELECTOR);

        /** @type FlyoutMenu[] */
        const instances = [];

        if (elements.length > 0) {
            elements.forEach((element) => instances.push(
                new FlyoutMenu(element)
            ));
        }

        return instances;
    }
}
