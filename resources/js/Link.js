export default class Link {
    /**
     * @param {Element} element
     */
    constructor(element) {
        /**
         * @type {Element}
         * @private
         */
        this._element = element;

        /**
         * @type {Element}
         * @private
         */
        this._target = this._element.querySelector('[data-target]');

        this._element.addEventListener('click', () => {
            window.location.href = this._target.getAttribute('href');
        });
    }

    static start() {
        const elements = document.querySelectorAll('[data-link]');
        const instances = [];

        if (elements.length > 0) {
            elements.forEach((element) => {
                instances.push(new Link(element));
            });
        }
    }
}
