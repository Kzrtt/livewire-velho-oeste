# Referencias do Projeto

## 1. Newsletter - Conteudo Base da Palestra
**URL:** https://webnews.dev.br/edition/20-%F0%9F%90%98-Livewire,-o-Inimigo-do-JavaScript-%28que-virou-meu-c%C3%BAmplice%29

Edicao 20 da WebNews, escrita por Felipe Kurt Pohling. Todo o conteudo e autoral e pode ser utilizado livremente na apresentacao (copiar trechos grandes e permitido).

### Conteudo Resumido da Newsletter

**O Inimigo do JavaScript**
Experiencia construindo o WebNews sem framework JavaScript no frontend durante 4 meses. Livewire como alternativa aos frameworks JS tradicionais.

**Laravel, Terreno Firme para Correr**
Tres pilares do Laravel:
- Eloquent: ORM com Model files, relacoes entre tabelas, integracao com Facade Auth
- Rotas: web.php, Facade Route, middlewares, integracao com Livewire
- Jobs: Queue workers (Redis/DB), Scheduler para CRON

**4 Meses de Livewire no WebNews**
Diretivas praticas:
- `wire:model="subscriberEmail"` - sincroniza input com backend
- `wire:click="subscribe"` - executa funcoes no backend
- `wire:loading.remove` - altera presenca de elementos

**Bastidores: Do wire:* Ate a Requisicao**
Ciclo de requisicao Livewire:
1. Cliente: Snapshot do componente + fila de acoes
2. Servidor: Re-hidratacao, execucao de syncInput e callMethod
3. Resposta: HTML novo, efeitos e snapshot atualizado
4. DOM: Morph (diff) no subarvore do componente

**Exemplo de Componente:**
```php
class AuthorDetails extends Component
{
    use Interactions;
    public $subscriberEmail = "";

    public function subscribe()
    {
        $this->validate([
            'subscriberEmail' => 'required|email'
        ]);
        // validacao e processamento
    }
}
```

**O Lado B (Limitacoes)**
- "Paginas tudo ao mesmo tempo agora" - multiplos componentes causam lentidao
- Microinteracoes visuais - melhor com Alpine.js
- JS rico (canvas, WYSIWYG) - requer JavaScript direto
- Regra pratica: Blade + Livewire quando possivel; JavaScript para UI pesada

**Livewire 4: Menos Friccao, Mais Fluxo**
- **Blaze**: Otimiza render de partes estaticas, economiza processamento
- **Single-File Components**: Padrao unico arquivo (estilo Volt) em vez de separar PHP/Blade
- **API com cara de front**: `this.` em lugar de `$wire`
- **Islands e loadings nativos**: Isolacao de blocos caros com lazy loading
- **SPA-like nativo**: Navegacao sem recarregar pagina

**Mini-Raio-X WebNews: Onde o v4 Cura Minhas Dores**
Com crescimento do projeto, adocao de Volt mantem codebase limpo. Dashboards sobrecarregadas serao otimizadas com @islands.

**Minha Visao com Vies**
"Sem o Livewire eu nao teria lugar nenhum pra escrever esse texto." Acredita em mudanca paradigmatica do PHP com Laravel. Livewire 4 e o melhor momento para adotar essa abordagem.

**Frase de Fechamento:**
"Se o Livewire comecou como inimigo do JavaScript, ele terminou virando meu cumplice: eu so chamo JS quando ele e a melhor ferramenta, nao por inercia."

**Creditos Citados na Newsletter:**
- Laravel News — Everything We Know About Livewire 4
- DevDojo (Tony Lea) — Livewire 4: The Future of PHP Components
- Laracon/YouTube — Why this new Livewire version changes everything

---

## 2. Site do Evento - PHP Velho Oeste 2025
**URL:** https://www.phpvelhoeste.com.br/2025/

Referencia de design. O evento usa:
- Paleta de tons de laranja (tematica velho oeste)
- Design moderno e profissional
- Cards de palestrantes com fotos e links sociais
- Grid organizado para agenda (30-31 de maio)
- Logo PHP Velho Oeste no topo
- Imagens do elePHPant na galeria
- Layout limpo com boa hierarquia visual

---

## 3. Documentacao Livewire 4
**URL:** https://livewire.laravel.com/docs/4.x/installation

### Instalacao
```bash
composer require livewire/livewire
```

### Comandos Uteis
```bash
php artisan livewire:layout    # Gera layout base
php artisan livewire:config    # Gera config/livewire.php
php artisan livewire:make nome  # Cria novo componente
```

### Requisitos
- Laravel 10+
- PHP 8.1+

### Diretivas no Layout
- `@livewireStyles` no `<head>`
- `@livewireScripts` antes do `</body>`
- Asset injection e automatico em paginas com componentes
