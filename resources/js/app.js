import './bootstrap';

import Alpine from 'alpinejs';

import { confirmDelete } from './delete-confirm';
window.confirmDelete = confirmDelete; // Biarkan bisa diakses global

window.Alpine = Alpine;

Alpine.start();
