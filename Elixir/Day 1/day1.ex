# Off by one? Not sure why
defmodule Sonar do
  def scan() do
    File.read!("input.txt")
    |> String.split("\n")
    |> mapper()
    |> Enum.reverse() |> tl() |> Enum.reverse()
    |> Enum.filter(fn x -> increase?(x) == true end)
    |> length()
  end

  defp mapper([head | tail]) do
    mapper(tail, [[head, List.first(tail)]])
  end

  defp mapper([], list) do
    list
  end

  defp mapper([head | tail], list) do
    mapper(tail, list ++ [[head, List.first(tail)]])
  end

  defp increase?([first, last]) do
    last > first
  end
end
