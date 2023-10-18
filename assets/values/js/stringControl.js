class StringControl {
    constructor() {
        this.strings = null;
    }

    async loadStrings() {
        try {
            const response = await fetch('assets/values/json/string.json');
            this.strings = await response.json();
        } catch (error) {
            console.error('Error al cargar las cadenas de texto', error);
        }
    }

    getString(view, key) {
        if (this.strings && this.strings[view] && this.strings[view][key]) {
            return this.strings[view][key];
        }
        return '';
    }
}

const stringControl = new StringControl();

// Cargar las cadenas de texto al inicializar la página
stringControl.loadStrings();
