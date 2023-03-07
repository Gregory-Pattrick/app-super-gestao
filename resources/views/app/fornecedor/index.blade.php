<h3>Fornecedor</h3>

{{-- Fica o comentário que será descartado pelo intrepertador Blade --}}

    <!-- Abrindo um bloco de código PHP -->
    {{-- 
    @php 

    @endphp 
    --}}

    {{-- Para imprimir variáveis do tipo array com blade usamos a seguinte sintax --}}
    {{-- 
        @dd($fornecedores) 
    --}}

    <!-- Estrutura do if com blade -->
    {{-- 
        @if(count($fornecedores) > 0 && count($fornecedores) < 10)
            <h3>Existem alguns fornecedores cadastrados!</h3>

            @elseif(count($fornecedores) > 10)
                <h3>Existem vários fornecedores cadastrados</h3>

            @else
                <h3>Ainda não existem fornecedores cadastrados</h3>

        @endif 
    --}}

    <!-- isset no Blade -->
    {{-- 
    @isset($fornecedores)
        Fornecedor: {{ $fornecedores[0]['nome'] }}
        <br>
        Status: {{ $fornecedores[0]['status'] }}
        <br>
        @isset($fornecedores[0]['cnpj'])
            CNPJ: {{ $fornecedores[0]['cnpj'] }}
            @empty($fornecedores[0]['cnpj'])
                - Vazio
            @endempty
        @endisset
    @endisset 
    --}}

    <!-- As duas formas a seguir representam o mesmo resultado -->
    {{-- @unless executa se o retorno for false --}}
    {{-- 
    @if(!($fornecedores[0]['status'] == 'S'))
        Fornecedor inativo
    @endif
    <br>
    @unless($fornecedores[0]['status'] == 'S')
        Fornecedor inativo
    @endunless
    <br> 
    --}}

    <!-- Switch na syntax Blade -->
    {{-- 
    @switch($fornecedores[1]['ddd'])
        @case ('11')
            São Paulo - SP
            @break
        @case ('32')
            Juiz de Fora - MG
            @break
        @case ('85')
            Fortaleza - CE
            @break
        @default
            Estado não identificado
    @endswitch 
    --}}

    <!-- Ternário com Blade -->
    <!-- Se á variavel testada estiver definida ou possuir o vlaor null o valor default será utilizado.-->
    {{-- CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'Dado não foi preenchido' }} --}}

@isset($fornecedores)

    <!-- For na syntax Blade -->
    {{-- 
    @for($i = 0; isset($fornecedores[$i]); $i++)
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores[$i]['status'] }}
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? ''}}) {{ $fornecedores[$i]['telefone'] ?? ''}}
        <hr>
    @endfor 
    --}}

    <!-- bloco de codigo php -->
    {{-- @php $i = 0 @endphp --}}

    <!-- While no Blade -->
    {{-- 
    @while(isset($fornecedores[$i]))
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores[$i]['status'] }}
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? ''}}) {{ $fornecedores[$i]['telefone'] ?? ''}}
            @php $i++ @endphp
        <hr>
    @endwhile 
    --}}

    <!-- Foreach no Blade -->
    {{-- 
    @foreach($fornecedores as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] ?? ''}}
        <hr>
    @endforeach 
    --}}

    <!-- Forelse no Blade -->
    <!-- Basicamento quando o array de valores vem vazio o forelse o trata exibindo diretamente a informação do '@ empty' -->
    @forelse($fornecedores as $indice => $fornecedor)

    <!-- Obj loop (essa váriavel só está disponivel no foreach e forealse pois não temos váriaveis de controle como no for e while) -->
    Iteração atual: {{ $loop->iteration }}
    <br>

        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] ?? ''}}
        <br>

        @if($loop->first)
            Primeira iteração do Loop!
        @endif

        @if($loop->last)
            Última iteração do Loop!
            <br>
            Total de registros: {{ $loop->count }}

        @endif
        <hr>

    @empty
        Não existem fornecedores cadastrados!
    @endforelse

    <!-- Para usar o scape ou seja imprimir o nome da variavel e outros dados em vez do seu valor usamos o '@': -->
    @{{ $fornecedores}}

@endisset







