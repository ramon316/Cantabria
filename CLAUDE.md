# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel 9 event management system for "Cantabria Eventos" - a business that manages social and corporate events including weddings, banquets, meetings, and other celebrations. The system handles clients, events, quotations (cotizaciones), inventory, services, payments, and contract generation.

**Stack:**
- Laravel 9 (PHP 8.1+)
- Livewire 2.10 for reactive components
- AdminLTE 3 for UI
- DomPDF for PDF generation (contracts and quotations)
- Spatie Laravel Permission for role-based access
- MySQL database
- Vue.js 2 with FullCalendar for event scheduling
- Laravel Mix for asset compilation

## Development Commands

### Running the Application
```bash
# Start development server (if using Laravel's built-in server)
php artisan serve

# Compile assets for development
npm run dev

# Watch for changes
npm run watch

# Compile for production
npm run production
```

### Database
```bash
# Run migrations
php artisan migrate

# Seed database
php artisan db:seed

# Refresh database (caution: drops all tables)
php artisan migrate:fresh --seed
```

### Testing
```bash
# Run all tests
vendor/bin/phpunit

# Run specific test suite
vendor/bin/phpunit --testsuite Feature
vendor/bin/phpunit --testsuite Unit

# Run specific test file
vendor/bin/phpunit tests/Feature/ExampleTest.php
```

### Cache Management
```bash
# Clear all caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Cache configuration
php artisan config:cache
php artisan route:cache
```

### Other Useful Commands
```bash
# Generate application key
php artisan key:generate

# Create storage symlink
php artisan storage:link

# Clear and rebuild composer autoload
composer dump-autoload
```

## Architecture Overview

### Core Business Entities

The system revolves around these primary models and their relationships:

**Events Workflow:**
1. **Cliente** (Client) - Contact information and relationships
2. **Cotizacion** (Quotation) - Initial pricing estimates for potential events
3. **Evento** (Event) - Confirmed events with full details
4. **EventoServicio** - Pivot connecting events to services
5. **Pago** (Payment) - Payment tracking for events
6. **Cuenta** (Account) - Bank accounts for payments

**Inventory System:**
- **tablecloth** / **tableclothbase** - Table linens inventory
- **floralbase** - Floral arrangement bases
- **chair** - Chair inventory
- **inventory** - Other miscellaneous items

**Supporting Entities:**
- **servicio** (Service) - Services offered (banquets, decoration, animation, etc.)
- **meet** (Meeting) - Client meetings/consultations
- **Checklist** - Event preparation checklist (auto-created via EventCreated event)
- **Discount** - Event-specific discounts
- **recommendation** - Client testimonials/recommendations
- **Banquet** - Detailed banquet service information

### Key Architectural Patterns

**Traits for Business Logic:**
The system uses traits to share common business logic across controllers:
- `EventoTrait` (app/Traits/EventoTrait.php) - Event cost calculations, service checks
- `CotizacionTrait` (app/Traits/CotizacionTrait.php) - Quotation cost calculations
- `ServicioTrait` (app/Traits/ServicioTrait.php) - Service-related utilities

These traits contain methods like:
- `costoEvento()` / `costoCotizacion()` - Calculate total costs
- `serviciosTrait()` - Retrieve services for events/quotations
- `decoracionExistTrait()` / `banquetExistTrait()` - Check if specific services exist
- `abonoEvento()` / `diferenciaEvento()` / `totalEvento()` - Payment calculations

**Livewire Components:**
The application heavily uses Livewire for reactive UI components:
- `QuoterCreate` - Interactive quotation service management
- `CreateEvent` - Event creation with real-time validation
- `ClientesIndex` / `CotizacionIndex` - Data tables with search/filtering
- Inventory indexes for tablecloths, floralbases, chairs, etc.
- `StatusEvent` - Event status updates
- `PaymentsList` - Payment tracking

**PDF Generation:**
- Contracts: `eventos/contrato` and `eventos/contratoEmpresa` views
- Quotations: `cotizacion/cotizacion` view
- Formats: Banquet layouts (`banquetes/formato`), Tablecloths (`manteleria/formato`)

**Event System:**
- `EventCreated` event fires when events are created
- `CreateChecklistForEvent` listener automatically creates checklists

### Permission System

Uses Spatie Laravel Permission with roles and gates. Common roles:
- Administrador (Administrator)
- Banquete (Banquet staff - limited to banquet-related events)

Permissions follow the pattern: `{resource}.{action}` (e.g., `eventos.create`, `clientes.index`)

### Date Handling

The system heavily uses Carbon for date manipulation:
- Event pricing based on year (`$evento->start->year`)
- Contract dates formatted with `formatearFecha()` method in EventoController
- Dates converted to Spanish text using `NumerosALetras::convertir()` utility

### Notable Business Logic

**Event Contracts:**
- Require a minimum advance payment of 15,000 before contract generation
- Auto-stored in `storage/app/contracts/`
- Different templates for Social vs. Empresa (corporate) events
- Include service lists, payment schedules, and legal terms

**Quotations:**
- Have validity periods (configurable days, stored in `validez` field)
- Services linked with quantities and costs via pivot table
- Can be converted to events

**Services:**
- Year-specific (services have an `año` field)
- Can be marked as gifts (`regalo` flag in pivot tables)
- Types include: Banquete, Decoración, Animación, Alimentos, etc.

### Views Structure

- Uses AdminLTE blade layout (`layouts/app.blade.php`)
- Livewire components in `resources/views/livewire/`
- PDF templates in respective folders (eventos, cotizacion, banquets, manteleria)
- Public landing page uses `layouts/portada.blade.php`

### Routes

All routes in `routes/web.php`. Most follow RESTful conventions but some use custom methods:
- Calendar: `/home` (uses FullCalendar)
- Events list JSON: `/eventos/list`
- Contracts: `/eventos/{evento}/contrato`
- Quotation PDF: `/cotizacion/{cotizacion}/trabajo` or `/cotizacion/cotizacion/{cotizacion}`
- Payment page: `/eventos/{evento}/pago`

### Database

Migrations are timestamped and located in `database/migrations/`. Key pivot tables:
- `evento_servicio` - Events to services
- `cotizacion_servicio` - Quotations to services
- `evento_tablecloth` - Events to tablecloths (with chair counts)
- `evento_floralbase` - Events to floral bases

## Code Conventions

- Models use singular names (e.g., `evento`, `cliente`, `servicio`)
- Controllers follow Laravel naming (e.g., `EventoController`, `CotizacionController`)
- Livewire components use PascalCase (e.g., `QuoterCreate`, `StatusEvent`)
- Database tables use plural names for main entities, pivot tables combine names
- Spanish naming throughout (this is a Spanish-language application)
- Flash messages use `flash()` helper or Laravel's `back()->with()`
- Authorization via middleware: `->middleware('can:permission.name')`

## Important Notes

- The system is configured for Spanish locale (`laraveles/spanish` package)
- AdminLTE menu configuration is in `config/adminlte.php`
- Activity logging uses Spatie Activity Log package
- Notifications sent via `contractInformation` notification class
- Image handling uses Intervention Image package
- CAPTCHA integration for public forms (`mews/captcha`)
