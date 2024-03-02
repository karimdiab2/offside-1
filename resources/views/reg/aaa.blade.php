@foreach ($test as $warehouse)
{{ $warehouse->id }}
												{{ $warehouse->warehouse_name }}
												{{ $warehouse->warehouse_address }}
												{{ $warehouse->created_at }}
												{{ $warehouse->updated_at }}
                                                @endforeach
