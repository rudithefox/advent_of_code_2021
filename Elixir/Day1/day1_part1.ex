# Originally off by 1. Turned out it was because the comparisons were string based. Resulted in one of the comparisons returning unexpected "false" (it was 997 -> 1009).
# Should double-check how those comparisons work.

# Get input, split by new line & feed the list to checkList/2
defmodule Sonar do
  def scan() do
    File.read!("input.txt")
    |> String.split("\n")
    |> checkList(0)
    |> IO.inspect()
  end

  # Give the list (& the number of elements) to increase/3
  def checkList(list, accumulator) do
    increase(list, accumulator, Enum.count(list))
  end

  # Output the total number of hits when there is no longer a new_head
  def increase([_head | _tail], accumulator, list_count) when list_count == 1 do
    accumulator
  end

  # Perform recursion over the list until there is only one element left
  def increase([head | tail], accumulator, _list_count) do
    # If the next entry is larger than the current head, increase accumulator & feed new list count to increase/3
    if Integer.parse(hd(tail)) > Integer.parse(head) do
      # Increased
      increase(tail, accumulator + 1, Enum.count(tail))
    else
      # Decreased
      increase(tail, accumulator, Enum.count(tail))
    end
  end
end
