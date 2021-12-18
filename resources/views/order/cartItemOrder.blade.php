@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h4 class="d-inline-block ps-4 pe-4 mb-3">Cart List</h4>
    @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-bordered border-warning table-light caption-top table-responsive table-hover table-striped align-middle">
        <tbody>
            <tr>
                <th>No</th>
                <th>Book</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </tbody>
        <tfoot class="border-warning">
            <tr>
                <td colspan="2">
                </td>
                <td class="text-center fs-5">Total</td>
                <td id="test">0 $</td>
            </tr>
        </tfoot>
    </table>
    <a class="btn btn-primary ps-4 pe-4" href="{{ route('home') }}">Back</a>
    <form action="{{ route('order')}}" method="GET" class="text-center d-inline-block float-end">
        <div id="inputDiv"></div>
        <button class="btn btn-warning ps-4 pe-4">Buy</button>
    </form>
</div>
<script>
    reuseFunction = (createParam, tagNameParam, lsKey, iterator, appendParam, bol) => {
        createParam = document.createElement(tagNameParam);
        if(bol){
            createParam.innerHTML = localStorage.getItem(lsKey+iterator);
        }
        appendParam.append(createParam);
        return createParam;
    }

    window.addEventListener('load', () => { 
        const inputDiv = document.getElementById('inputDiv');
        let numberLsCounter = Number(localStorage.getItem('lsCounter'));
        let number = 1;
        let total = 0;
        for(let i = 1; i <= numberLsCounter; i++){
            if(!localStorage.getItem('title'+i)){
                continue;
            }

            let createTableRowTag = document.createElement('tr');
            document.getElementsByTagName('tbody')[0].append(createTableRowTag);
            let createTableNumberDataTag = document.createElement('td');
            createTableNumberDataTag.innerHTML = number++;
            createTableRowTag.append(createTableNumberDataTag);
            
            let createdTableImgDataTag = reuseFunction('createTableImgDataTag', 'td', '', '', createTableRowTag, false);
            let createdImgTag = reuseFunction('createImgTag', 'img', '', '', createdTableImgDataTag, false);
            createdImgTag.src = "images/" +localStorage.getItem('image'+i);
            createdImgTag.width = "80";
            
            let createdTableTitleDataTag = reuseFunction('createTableTitleDataTag', 'td', 'title', i, createTableRowTag, true);
            let createdTablePriceDataTag = reuseFunction('createTablePriceDataTag', 'td', 'price', i, createTableRowTag, true);
            total += Number(localStorage.getItem('price'+i))
            document.getElementById('test').innerHTML = total;

            let createdInputTitleTag = reuseFunction('createInputTitleTag', 'input', '', '', inputDiv, false);
            createdInputTitleTag.type = "hidden";
            createdInputTitleTag.name = "title" + i;
            createdInputTitleTag.value = localStorage.getItem('title'+i);
        }
    })
</script>
@endsection