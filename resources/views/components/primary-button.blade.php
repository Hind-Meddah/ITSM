<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mr-3 btn btn-primary','style'=>'color:#fff;align-items: center;appearance: button;background-color: #5d849d;border-radius: 5px;border-style: none;box-shadow: rgba(255, 255, 255, 0.26) 0 1px 2px inset;box-sizing: border-box;color: #fff;cursor: pointer;display: flex;flex-direction: row;flex-shrink: 0;font-size: 100%;line-height: 1.15;margin: 0;padding: 10px 21px;text-align: center;text-transform: none;transition: color .13s ease-in-out,background .13s ease-in-out,opacity .13s ease-in-out,box-shadow .13s ease-in-out;user-select: none;-webkit-user-select: none;touch-action: manipulation;margin: 0 0 0 10px;']) }}>
    {{ $slot }}
</button>