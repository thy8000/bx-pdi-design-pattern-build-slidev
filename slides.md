---
theme: seriph
background: ./assets/images/background-principal.jpg
title: (Projeto PDI) Design Patterns
info: |
  ## Este é um slide para o Projeto PDI da Buildox explicando sobre o Design Pattern chamado Builder.
class: text-center
highlighter: shiki
drawings:
  persist: false
transition: slide-left
mdc: true
---

# (Projeto PDI) Design Patterns

<div>
  <h2 class="text-black">Builder</h2>
</div>

<div class="abs-br m-6 flex gap-2 text-black bg-[#9ca3af80] p-2">
  <div>
    Autor: <strong>Thunay Moreira de Soares</strong> | Buildbox IT Solutions
  </div>
</div>

<style>
  h1 {
    color: black !important;
  }

  .slidev-layout {
    background-image: url(./assets/images/background-principal.jpg) !important;
  }
</style>

---
transition: slide-up
---

# O que é o Builder ? 

<div class="flex">
  <div class="w-1/2">
    <p>Builder é um padrão de projeto que permite construir objetos complexos passo-a-passo. Com este padrão, é possível criar vários tipos de um mesmo objeto utilizando o mesmo código de construção.</p>
  </div>
</div>

<style>
h1 {
  background-color: #2B90B6;
  background-image: linear-gradient(45deg, #00695a 10%, #5fc0b1 20%);
  background-size: 100%;
  -webkit-background-clip: text;
  -moz-background-clip: text;
  -webkit-text-fill-color: transparent;
  -moz-text-fill-color: transparent;
}

  .slidev-layout {
    background-image: url(./assets/images/background-secundario.jpg) !important;
    background-size: cover;
    background-repeat: no-repeat;

    display: flex;
    flex-direction: column;
    justify-content: center;
  }
</style>

---
transition: fade-out
---

# Porquê utilizar o Builder ?

<div>
  <h2>Problema 1</h2>
  <div class="flex gap-8">
    <div class="w-1/2 text-sm">
      <p>Imagine que precisamos criar uma classe do tipo House. Uma casa simples pode ser constrúida com quatro paredes, um piso e um telhado. Mas, e se precisássemos de uma casa com mais coisas e mais detalhes, como por exemplo, janelas, piscina, etc... ?</p>
      <p>A solução mais simples seria extender a classe House e criar várias subclasses que cumpra todos os parâmetros necessários para a casa. No começo, a solução seria viável, porém, com o tempo, qualquer novo parâmetro para a casa exigiria mais e mais subclasses, crescendo muito a hierarquia da classe.</p>
    </div>
    <div>
    <figure>
      <img src="https://refactoring.guru/images/patterns/diagrams/builder/problem1.png?id=11e715c5c97811f848c48e0f399bb05e"><figcaption class="text-xs text-gray">No começo, essa solução seria viável, porém, com o tempo, seria necessário criar dezenas de subclasses.</figcaption>
    </figure>
    </div>
  </div>
</div>

<style>
  h1 {
    background-color: #2B90B6;
    background-image: linear-gradient(45deg, #00695a 10%, #5fc0b1 20%);
    background-size: 100%;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    -webkit-text-fill-color: transparent;
    -moz-text-fill-color: transparent;
  }
  .slidev-layout {
    background-image: url(./assets/images/background-secundario.jpg) !important;
  }
</style>
---
transition: slide-up
---

# Porquê utilizar o Builder ?

<div>
  <h2>Problema 2</h2>
  <div class="flex gap-8">
    <div class="w-4/5 text-sm">
      <p>Uma abordagem alternativa que poderia ser utilizado para mitigar o problema. A abordagem consistiria em criar um construtor na classe House, com todos os parâmetros possíveis para o objeto da casa. Essa abordagem solucionaria o problema de ter várias subclasses, porém, ia gerar outro problema.</p>
      <p>Na maioria dos casos, a maioria dos parâmetros não seriam usados, criando chamadas de construtores bem feias, longas e complexas.</p>
    </div>
    <div>
    <figure>
      <img src="https://refactoring.guru/images/patterns/diagrams/builder/problem2.png?id=2e91039b6c7d2d2df6ee519983a3b036"><figcaption class="text-xs text-gray">Um construtor com muitos parâmetros resolveria o problema inicial, porém, ia gerar uma cascata de construtores com inúmeros true e falses, deixando o entendimento da classe confusa.</figcaption>
    </figure>
    </div>
  </div>
</div>

<style>
  h1 {
    background-color: #2B90B6;
    background-image: linear-gradient(45deg, #00695a 10%, #5fc0b1 20%);
    background-size: 100%;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    -webkit-text-fill-color: transparent;
    -moz-text-fill-color: transparent;
  }
  .slidev-layout {
    background-image: url(./assets/images/background-secundario.jpg) !important;
  }
</style>

---
transition: fade-out
---

# Solução

<div>
  <h2>Padrão Builder</h2>
  <div class="flex gap-8">
    <div class="w-4/5 text-sm">
      <p>A solução seria a implementação do padrão Builder.</p>
      <p>O padrão Builder consiste em extrair e separar o código de construção de um objeto em partes separadas que chamamos de Builders.</p>
      <p>Com o padrão Builder, você organiza a construção do objeto em várias etapas em métodos dentro de um objeto. A parte importante desse processo, é que você não precisa chamar todas as etapas, apenas as que você irá utilizar na construção do objeto.</p>
    </div>
    <div>
    <figure>
      <img src="https://refactoring.guru/images/patterns/diagrams/builder/solution1.png?id=8ce82137f8935998de802cae59e00e11"><figcaption class="text-xs text-gray">O padrão Builder separa a criação do objeto em vários métodos diferentes, permitindo a construção do mesmo por etapas.</figcaption>
    </figure>
    </div>
  </div>
</div>

<style>
  h1 {
    background-color: #2B90B6;
    background-image: linear-gradient(45deg, #00695a 10%, #5fc0b1 20%);
    background-size: 100%;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    -webkit-text-fill-color: transparent;
    -moz-text-fill-color: transparent;
  }
  .slidev-layout {
    background-image: url(./assets/images/background-secundario.jpg) !important;
  }
</style>

---
transition: fade-out
---

# Solução

<div>
  <h2>Padrão Builder</h2>
  <div class="flex gap-8">
    <div class="w-4/5 text-sm">
      <p>Uma das extensões que você pode utilizar na classe Builder é uma Interface.</p><p>Caso você tenha classes Builder que possuem os mesmos métodos, só que com funcionamento diferente, você pode utilizar uma interface com todos os métodos que o Builder deve ter, e dentro da classe Builder você modifica o método de acordo com a necessidade.</p><p>Vamos utilizar como exemplo a classe House. Todas as casas possuem paredes e telhados, porém, o material utilizado nas paredes e telhados são diferentes. Podem ser tijolo, bambu, madeira, etc...</p><p>Uma solução para isso seria criar uma interface com os métodos que constroem a casa, e dentro do método da classe House, você modifica as paredes e os telhados com o material correto</p>
    </div>
    <div>
    <figure><img src="https://refactoring.guru/images/patterns/content/builder/builder-comic-1-en.png?id=605a699e1cb1241162db0530c7c1af4c"><figcaption class="text-xs text-gray">O padrão Builder separa a criação do objeto em vários métodos diferentes, permitindo a construção do mesmo por etapas.</figcaption></figure>
    </div>
  </div>
</div>

<style>
  h1 {
    background-color: #2B90B6;
    background-image: linear-gradient(45deg, #00695a 10%, #5fc0b1 20%);
    background-size: 100%;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    -webkit-text-fill-color: transparent;
    -moz-text-fill-color: transparent;
  }
  .slidev-layout {
    background-image: url(./assets/images/background-secundario.jpg) !important;
  }
</style>